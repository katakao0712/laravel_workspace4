<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        //orderBy で最新登録が先頭に来るように
        //paginate で10行ごとにページング処理

        return view('users.index')->with('users',$users);
        // 取得したデータは with() を利用し、ビューへ送る。view('view名')->with('viewでの変数名','実データ');
    }
    
    public function create(){
        return view('users.create');  
    }
    
    public function store(Request $request){
       /*** ここからバリデーション ***/
            // 評価対象
            $inputs = $request->all();

            // ルール
            $rules = [
                'name'     => 'required',
                'email'    => 'required|email|unique:users',
                'password' => 'required',
            ];

            // 表示メッセージ
            $messages = [
                'name.required' => '名前は必須です。',
                'email.required' => 'E-mailは必須です。',
                'email.email' => 'E-mailの形式で入力してください。',
                'email.unique' => 'このメールアドレスは既に登録されています。',
                'password.required' => 'パスワードは必須です。',
            ];

            $validation = \Validator::make($inputs,$rules,$messages);

            // エラー時の処理
            if($validation->fails())
            {
                return redirect()->back()->withErrors($validation->errors())->withInput();
            }
        /*** ここまでバリデーション ***/

        // userオブジェクト生成
        $user = new User;

        // 値の登録
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = Hash::make($request->password); // パスワードのハッシュ化

        // 保存
        $user->save();

        // 一覧にリダイレクト
        return redirect()->to('/users');
        
    }
  
    public function show($id){
    // レコード検索
    $user = User::find($id);
    // 検索結果をビューに渡す
    return view('users.show')->with('user', $user);
    }
  
    public function edit($id){
        // レコードを検索
        $user = User::find($id);

        // 検索結果をビューに渡す
        return view('users.edit')->with('user', $user);
    }
    
    public function update(Request $request, $id){
      // レコードを検索
      $user = User::find($id);

      // 値を代入
      $user->name     = $request->name;
      $user->email    = $request->email;
      $user->password = Hash::make($request->password);

      // 保存(更新)
      $user->save();

      // リダイレクト
      return redirect()->route('users.show',[$id]);
    }
  
    public function destroy($id){
        // 削除対象レコードを検索
        $user = User::find($id);

        // 削除
        $user->delete();

        // リダイレクト
        return redirect()->to('/users');
    }
    
}

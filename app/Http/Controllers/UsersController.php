<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function index(){
        $users = User::orderBy('id','desc')->paginate(10);
        //orderBy で最新登録が先頭に来るように
        //paginate で10行ごとにページング処理

        return view('users.index')->with('users',$users);
        // 取得したデータは with() を利用し、ビューへ送る。
        //view('view名')->with('viewでの変数名','実データ');
    }
}

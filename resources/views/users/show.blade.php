@extends('layouts.default')

@section('content')

    <h1>詳細表示</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- table -->
    <table class="table table-striped">
        <tr><td>ID</td><td>{{ $user->id }}</td></tr>
        <tr><td>名前</td><td>{{ $user->name }}</td></tr>
        <tr><td>E-mail</td><td>{{ $user->email }}</td></tr>
        <tr><td>パスワード</td><td>{{ $user->password }}</td></tr>
        <tr><td>登録日</td></td><td>{{ $user->created_at }}</td></tr>
        <tr><td>更新日</td></td><td>{{ $user->updated_at }}</td></tr>
    </table>

@endsection
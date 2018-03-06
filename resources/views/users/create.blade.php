@extends('layouts.default')

@section('content')

    <h1>新規作成</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="/users">
        {{ csrf_field() }}

        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="" class="form-control">
        </div>

        <div class="form-group">
            <label>E-Mail</label>
            <input type="text" name="email" value="" class="form-control">
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="text" name="password" value="" class="form-control">
        </div>

        <input type="submit" value="登録" class="btn-primary">

    </form>

@endsection
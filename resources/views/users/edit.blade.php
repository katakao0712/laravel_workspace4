@extends('layouts.default')

@section('content')

    <h1>情報編集</h1>

    <div class="row"></div>
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="/users/{{ $user->id }}" style="width: 1170px; margin:auto;">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label>E-Mail</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label>パスワード</label>
            <input type="text" name="password" value="" class="form-control">
        </div>

        <input type="submit" value="更新" class="btn-primary">

    </form>

@endsection
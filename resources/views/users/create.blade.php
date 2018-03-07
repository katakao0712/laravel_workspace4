@extends('layouts.default')

@section('content')

    <h1>新規作成</h1>

    <div class="row"></div>
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>

    <!-- form -->
    <form method="post" action="/users" style="width: 1170px; margin:auto;">
        {{ csrf_field() }}

        <!-- エラーがあるかどうかを判断して、has-errorクラスを追加 -->
        <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            <label>名前</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
            <!-- （最初の）エラーメッセージ表示 -->
            <span class="help-block">{{ $errors->first('name') }}</span>
        </div>

        <!-- エラーがあるかどうかを判断して、has-errorクラスを追加 -->
        <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            <label>E-Mail</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
            <!-- （最初の）エラーメッセージ表示 -->
            <span class="help-block">{{ $errors->first('email') }}</span>
        </div>

        <!-- エラーがあるかどうかを判断して、has-errorクラスを追加 -->
        <div class="form-group @if(!empty($errors->first('password'))) has-error @endif">
            <label>パスワード</label>
            <input type="text" name="password" value="" class="form-control">
            <!-- （最初の）エラーメッセージ表示 -->
            <span class="help-block">{{ $errors->first('password') }}</span>
        </div>

        <input type="submit" value="登録" class="btn-primary">

    </form>

@endsection
@extends('layouts.default')

@section('content')

    <h1>一覧表示</h1>
    
        <!-- 新規登録ボタン -->
    <div class="row">
        <div class="col-sm-12">
            <a href="/users/create" class="btn btn-primary" style="margin:20px;">新規登録</a>
        </div>
    </div>

    <table class="table table-striped">
        @forelse($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="/users/{{ $user->id }}" class="btn btn-primary btn-sm">詳細</a></td>
                <td><a href="/users/{{ $user->id }}/edit" class="btn btn-primary btn-sm">編集</a></td>
                <td>
                    <form method="post" action="/users/{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
                    </form>
                </td>
            </tr>
        @empty
          <p>ユーザーが存在しません</p>
        @endforelse
    </table>

    <!-- page control -->
    {!! $users->render() !!}

@endsection
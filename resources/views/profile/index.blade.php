@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center">プロフィール編集</div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif

            @if (count($errors) > 0)
                <ul class="alert alert-danger" style="list-style: none;">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('profile.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <details>
                        <summary class="summaryText">
                            <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                            氏名
                        </summary>
                        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                    </details>
                </div>
                <div class="form-group">
                    <details>
                        <summary class="summaryText">
                            <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                            メールアドレス
                        </summary>
                        <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                    </details>
                </div>
                <div class="form-group">
                    <details>
                        <summary class="summarytext">
                            <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                            新しいパスワード
                        </summary>
                        <input class="form-control" type="password" name="newpass">
                        <p>新しいパスワード（確認用）</p>
                        <input class="form-control" type="password" name="newpass_confirmation">
                    </details>
                </div>
                <div class="form-group">
                    <p>現在のパスワード</p>
                    <input class="form-control" type="password" name="oldpass">
                </div>
                <p><input type="submit" class="btn btn-primary" value="送信" style="margin-top: 10px"></p>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
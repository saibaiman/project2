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
                        <div class="list-group">
                            <span class="list-group-item" data-toggle="collapse" href="#name">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                氏名
                            </span>
                            <div class="collapse" id="name">
                                <div class="well">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item" data-toggle="collapse" href="#email">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                メールアドレス
                            </span>
                            <div class="collapse" id="email">
                                <div class="well">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item" data-toggle="collapse" href="#newpass">
                                <span class="glyphicon glyphicon-plus" style="font-size: 25px" aria-hidden="true"></span> 
                                新しいパスワード
                            </span>
                            <div class="collapse" id="newpass">
                                <div class="well">
                                    <div class="form-group">
                                        新しいパスワード
                                        <input class="form-control" type="password" name="newpass">
                                        新しいパスワード（確認用）
                                        <input class="form-control" type="password" name="newpass_confirmation">
                                    </div>
                                </div>
                            </div>
                            <span class="list-group-item">
                                現在のパスワード
                                <div class="form-group">
                                    <input class="form-control" type="password" name="oldpass">
                                </div>
                            </span>
                            <input type="submit" class="btn btn-info btn-block" value="送信" style="margin-top: 10px">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
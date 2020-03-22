@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                <p>氏名</p>
                <input type="text" name="name" value="{{ $user->name }}">
                <p>メールアドレス</p>
                <input type="text" name="email" value="{{ $user->email }}">
                <p>新しいパスワード</p>
                <input type="password" name="newpass">
                <p>新しいパスワード（確認用）</p>
                <input type="password" name="newpass_confirmation">
                <p>現在のパスワード</p>
                <input type="password" name="oldpass">
                <input type="submit" class="btn btn-primary" value="送信">
            </form>
        </div>
    </div>
</div>
@endsection
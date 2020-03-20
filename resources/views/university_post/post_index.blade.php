@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-success">{{session('error')}}</div>
            @endif
            <input id="lefile" type="file" style="display:none">
            <!--  ここをcssで投稿がなくても掲示板の形を取るようにする -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                <p style="text-align:center;">
                    <label>{{ $thread->title }}</label>
                </p>
            </div>
            <form method="post" action="{{ route('universityposts.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                    <input type="text" name="body" class="form-control" placeholder="ここにテキストを入力">
                    <span class="input-group-btn">
                        <label>
                            <span class="btn btn-info">
                                画像を追加
                                <input type="file" name="image" class="form-control" style="display:none">
                            </span>
                        </label>
                        <input type="submit" class="btn btn-info" value="投稿する">
                    </span>
                </div>
            </form>
            <ul class="list-group">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <font size="2" color="#7e8183">
                            {{ $post->created_at }}
                        </font>
                        <br>
                        @if ($post->image_path)
                            <img src="{{asset('storage/post_board_img/' . $post->image_path)}}">
                        @else 
                            <p style="overflow-wrap: break-word">
                                {{ $post->body }}
                            </p>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <font size="1" color="#7e8183">
        <ul class="nav nav-pills" style="text-align: center">
            <li role="presentation" style="width: 24%"><a href="#">マイページ</a></li>
            <li role="presentation" style="width: 25%" class="active"><a href="{{ route('schedules.index') }}">時間割</a></li>
            <li role="presentation" style="width: 25%"><a href="#">大学掲示板</a></li>
            <li role="presentation" style="width: 24%"><a href="#">お知らせ</a></li>
        </ul>
    </font>
</nav>
@endsection
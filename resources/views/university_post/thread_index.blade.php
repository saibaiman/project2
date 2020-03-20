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
                    <label> {{ config('thread.' . $id) }}のスレッド一覧</label>
                </p>
            </div>
            <form method="post" action="{{ route('threads.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="hidden" name="type_id" value="{{ $id }}">
                    <input type="text" name="title" class="form-control" placeholder="スレッドのタイトルを入力">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-info" value="新規スレッドをオープンする">
                    </span>
                </div>
            </form>
            <ul class="list-group">
                @if ($threads->isNotEmpty())
                    @foreach ($threads as $thread)
                        <li class="list-group-item">
                            <a class="list-group-item" href="{{ route('universityposts.show', ['id' => $thread->id]) }}" style="overflow-wrap: break-word">
                                <font size="2" color="#7e8183">
                                    {{ $thread->created_at }}にオープン
                                    閲覧数{{ $thread->count }}回
                                </font>
                                <p>{{ $thread->title }}</p>
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item">スレッドはまだありません。</li>
                @endif
            </ul>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <font size="1" color="#7e8183">
        <ul class="nav nav-pills" style="text-align: center">
            <li role="presentation" style="width: 24%"><a href="#">マイページ</a></li>
            <li role="presentation" style="width: 25%"><a href="{{ route('schedules.index') }}">時間割</a></li>
            <li role="presentation" style="width: 25%" class="active"><a href="{{ route('threads.index') }}">大学掲示板</a></li>
            <li role="presentation" style="width: 24%"><a href="#">お知らせ</a></li>
        </ul>
    </font>
</nav>
@endsection
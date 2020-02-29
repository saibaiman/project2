@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">掲示板</div>
                
                @foreach ($postss as $post)
                    {{$post}}
                @endforeach
                
                <!-- この部分をform使ったajaxできたらユーザーbest-->
                <!-- コメント量を増やしアクティブさを増やすためにコメントの編集はなしで行く？('LINEのイメージ')-->
                投稿する
                <form>
                    <input type="text" name="post" textholder="送信する">
                    <input type="submit" value="投稿する">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

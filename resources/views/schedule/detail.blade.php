@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ config('time.' . $id) }} 授業情報</div>
                
                <div class="panel-body">
                    <label>授業名</label><p>{{ $lecture->name }}</p>
                    <label>教室</label><p>{{ $lecture->room_number }}</p>
                    <label>担当教員</label><p>{{ $lecture->teacher }}</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    @if (session('message'))
                        <div class="alert alert-success">{{session('message')}}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-success">{{session('error')}}</div>
                    @endif

                    <!--  ここをcssで投稿がなくても掲示板の形を取るようにする -->

                    @if ($posts->isNotEmpty())
                        <table>
                            @foreach ($posts as $post)
                                <tr>
                                    @if ($post->image_path)
                                        <td><img src="{{asset('storage/post_board_img/' . $post->image_path)}}"></td>
                                    @else 
                                        <td>{{$post->body}} 投稿者{{$post->user->name}}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>   
                    @else

                    @endif

                    <form method="post" action="{{ route('class.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="class_id" value="{{$id}}">
                        <input type="text" name="body" class="form-control">
                        <input type="file" name="image" class="form-control">
                        <input type="submit" value="投稿する">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
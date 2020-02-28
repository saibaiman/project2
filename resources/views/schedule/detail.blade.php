@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ config('time.' . $id) }} 授業情報</div>
                
                <div class="panel-body">
                    <label>授業名</label>
                        <p>{{ $lecture->name }}</p>
                    <label>教室</label>
                        <p>{{ $lecture->room_number }}</p>
                    <label>担当教員</label>
                        <p>{{ $lecture->teacher }}</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    ここに掲示板をくっつけるイメージ
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
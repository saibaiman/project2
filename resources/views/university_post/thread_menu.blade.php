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
            
            {{ config($pref_id . '.' . $university_id .'.name') }}の全体掲示板
            <div class="panel panel-default">
                <div class="list-group">
                    @for ($i = 1; $i <= 4; $i++)
                        <a class="list-group-item" href="{{ route('threads.show', ['id' => $i]) }}">
                            <p class="list-group-item-heading">{{ config('thread.' . $i) }}</p>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
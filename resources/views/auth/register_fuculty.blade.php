@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">学部選択</div>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            @if (session('error'))
                            <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('select.class') }}" method="get">
                                <select name="fuculty_id" class="form-control">
                                    @foreach ($fuculties['fuculty'] as $fuculty => $value)
                                    <option value="{{$fuculty}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="学科選択へ">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
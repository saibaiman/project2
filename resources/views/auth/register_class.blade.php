@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">学部選択</div>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                        <label for="school" class="col-md-4 control-label">学部を選択してください</label>
                        <div class="col-md-6">
                            @if (session('error'))
                            <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('register') }}" method="GET">
                                <select name="class_id" class="form-control">
                                    @foreach ($classes as $class => $value)
                                    <option value="{{$class}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="確認へ">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
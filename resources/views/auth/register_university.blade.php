@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">学校選択</div>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            @if (session('error'))
                            <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('select.fuculty') }}" method="get">
                                <select name="university_id" class="form-control">
                                    @foreach ($schools as $key => $value)
                                    <option value="{{$key}}">{{$value['name']}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="学部選択へ">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
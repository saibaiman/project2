@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">大学所在地</div>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('pref') ? ' has-error' : '' }}">
                        <label for="pref" class="col-md-4 control-label">所属する大学のある県名を選択してください</label>
                        <div class="col-md-6">
                            @if (session('error'))
                                <p class="alert alert-danger">{{ session('error') }}</p>
                            @endif
                            <form action="{{ route('select.university') }}">
                                <select name="pref_id" class="form-control">
                                    @foreach ($prefs as $key => $pref)
                                    <option value="{{$key}}">{{$pref}}</option>
                                    @endforeach
                                </select>
                                <input type="submit" value="学校選択へ">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
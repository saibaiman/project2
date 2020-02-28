@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ config('time.' . $day_id) }} 授業情報</div>

                <div class="panel-body">
                    この部分にuniversity_id、曜日、時間で絞り込みした候補を表示
                    <p>・</p>
                    <p>・</p>
                    <p>・</p>
                    <details>
                        <summary>
                            授業新規登録はこちら
                        </summary>
                        <form class="form-horizontal" method="POST" action="{{ route('class.update', ['id' => $day_id]) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">授業名</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">教室</label>

                                <div class="col-md-6">
                                    <input id="room" type="text" class="form-control" name="room" required>

                                    @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('teacher') ? ' has-error' : '' }}">
                                <label for="teacher" class="col-md-4 control-label">担当教員</label>

                                <div class="col-md-6">
                                    <input id="teacher" type="text" class="form-control" name="teacher" required>

                                    @if ($errors->has('teacher'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teacher') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        登録する
                                    </button>
                                </div>
                            </div>
                        </form>
                    </details>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center">
                    {{ config('time.' . $day_id) }} 授業登録
                </div>
                
                <div class="panel-body">
                    <div class="already_classes">
                        @if ($classes->isNotEmpty())
                            @foreach ($classes as $class)
                                <form class="form-horizontal" method="POST" action="{{ route('schedules.store') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $class->id }}" name="id">
                                    <input type="submit" style="appearance: none;border:none;" value="{{ $class->name }}">
                                </form>
                            @endforeach
                            {{ $classes->appends(['id' => $day_id])->links() }}
                        @endif
                    </div>
                    <details>
                        <summary>
                            授業新規登録はこちら
                        </summary>
                        <form class="form-horizontal" method="POST" action="{{ route('class.update', ['id' => $day_id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

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

                            <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                                <label for="room_number" class="col-md-4 control-label">教室</label>

                                <div class="col-md-6">
                                    <input id="room" type="text" class="form-control" name="room_number" required>

                                    @if ($errors->has('room_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room_number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="panel-body">
                                    @if ($classes->isNotEmpty())
                                        @foreach ($classes as $class)
                                            <div class="list-group-item">
                                                <form class="form-horizontal" method="POST" action="{{ route('schedules.store') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{ $class->id }}" name="id">
                                                    <input type="submit" style="appearance: none;border:none;" value="{{ $class->name }}">
                                                    担当教員：{{ $class->teacher }}
                                                    <br>
                                                    {{ $class->count }}人が登録中
                                                </form>
                                            </div>
                                        @endforeach
                                    @else
                                        <p>現在登録されている授業はありません。</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')
@section('content')
<div class="container" style="margin-top: 10px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align: center">
                    {{ config('time.' . $day_id) }} 授業登録
                </div>
                
                <div class="panel-body">
                    <div class="already_classes">
                        <div class="list-group">
                            <p>自分の授業がない場合は新しく登録しましょう！</p>
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
                            <div class="panel panel-default">
                                <div class="panel-heading" style="text-align: center">
                                    {{ config('time.' . $day_id) }}の授業一覧
                                    @if ($classes->isNotEmpty())
                                        @foreach ($classes as $class)
                                            <form class="form-horizontal" method="POST" action="{{ route('schedules.store') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $class->id }}" name="id">
                                                <input type="submit" style="appearance: none;border:none;" value="{{ $class->name }}">
                                                この授業の登録者 {{ $class->count }}人
                                            </form>
                                        @endforeach
                                        {{ $classes->appends(['id' => $day_id])->links() }}
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
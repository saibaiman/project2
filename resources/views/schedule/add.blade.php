@extends('layouts.app')
<!-- Scripts -->
<script src="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.js"></script>
<script>
jQuery(function($){
    $.extend( $.fn.dataTable.defaults, {
        language: {
            url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"
        }
    });
    $("#foo-table").DataTable({
        lengthMenu: [ 20, 40, 60 ],
        // 件数のデフォルトの値を50にする
        displayLength: 20,  
    });
});
</script>

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ config('time.' . $day_id) }} 授業登録</div>

                <div class="panel-body">
                    <table id="foo-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>数字</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 100; $i++)
                                <tr>
                                    <td>{{ $i }}</td>   
                                    <td>{{ $i }} ダミー</td>
                                </tr>
                            @endfor 
                        </tbody>
                    </table>
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

                            <div class="form-group{{ $errors->has('room_number') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">教室</label>

                                <div class="col-md-6">
                                    <input id="room" type="text" class="form-control" name="room" required>

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
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <font size="1" color="#7e8183">
        <ul class="nav nav-pills" style="text-align: center">
            <li role="presentation" style="width: 24%"><a href="#">マイページ</a></li>
            <li role="presentation" style="width: 25%" class="active"><a href="{{ route('schedules.index') }}">時間割</a></li>
            <li role="presentation" style="width: 25%"><a href="#">大学掲示板</a></li>
            <li role="presentation" style="width: 24%"><a href="#">お知らせ</a></li>
        </ul>
    </font>
</nav>
@endsection
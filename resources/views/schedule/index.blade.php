@extends('layouts.app')
<link href="css/style.css" rel="stylesheet" type="text/css">
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table border=1>
                <tr>
                    <th bgcolor="#dce6f5" width="10%"></th>
                    <th bgcolor="#dce6f5" width="15%">月</th>
                    <th bgcolor="#dce6f5" width="15%">火</th>
                    <th bgcolor="#dce6f5" width="15%">水</th>
                    <th bgcolor="#dce6f5" width="15%">木</th>
                    <th bgcolor="#dce6f5" width="15%">金</th>
                    <th bgcolor="#dce6f5" width="15%">土</th>
                </tr>
                @php
                    $j = 1;
                @endphp
                <!-- 以下の部分は改善の余地あり -->
                @for ($i = 1; $i <= 36; $i++)
                    @if ($i % 6 == 1)
                        <tr><td bgcolor="#dce6f5" width="4%">{{ $j++ }}</td>
                    @endif
                    <td width="16%">
                        @if ($lecture_infos[$i] == null)
                            <a href="{{ route('schedules.create', ['id' => $i]) }}">{{ '-' }}</a>
                        @else
                            <font size="1" color="#7e8183">
                                <a href="{{ route('class.show', ['id' => $i]) }}">{{ $lecture_infos[$i]['name'] }}<br>{{ $lecture_infos[$i]['room_number'] }}</a>
                            </font>
                        @endif
                    </td>
                    @if ($i % 6 == 0)
                        </tr>
                    @endif
                @endfor
            </table>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed-bottom">
    <font size="1" color="#7e8183">
        <ul class="nav nav-pills" style="text-align: center">
            <li role="presentation" style="width: 24%"><a href="#">マイページ</a></li>
            <li role="presentation" style="width: 25%" class="active"><a href="{{ route('schedules.index') }}">時間割</a></li>
            <li role="presentation" style="width: 25%"><a href="{{ route('threads.index') }}">大学掲示板</a></li>
            <li role="presentation" style="width: 24%"><a href="#">お知らせ</a></li>
        </ul>
    </font>
</nav>
@endsection
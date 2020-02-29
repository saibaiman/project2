@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">時間割</div>

                <div class="panel-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="text-center">
                    <table class='table'>
                        <tr>
                            <th></th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th>
                        </tr>
                        <!-- 以下の部分は改善の余地あり -->
                        @for ($i = 1; $i <= 36; $i++)
                            @if ($i % 6 == 1)
                                <tr><td>○限</td>
                            @endif
                            <td>
                                @if ($lecture_infos[$i] == null)
                                    <a class="btn btn-default" href="{{ route('schedules.create', ['id' => $i]) }}">{{ '-' }}</a>
                                @else
                                    <a class="btn btn-primary" href="{{ route('class.show', ['id' => $i]) }}">{{ $lecture_infos[$i]['name'] }}<br>{{ $lecture_infos[$i]['room_number'] }}</a>
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
        </div>
    </div>
</div>
@endsection
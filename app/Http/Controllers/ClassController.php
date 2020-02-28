<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Schedule;
use App\Lecture;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::id();
        $schedule = Schedule::where('user_id', $user_id)->first();
        $class_id = 'class_' . $id;
        $schedule_id = $schedule->$class_id;
        $lecture = Lecture::where('id', $schedule_id)->first();
        return view('schedule.detail', compact('id', 'lecture'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //授業登録時に時間割表も更新する
    public function update(Request $request, $id)
    {
        $user_info = Auth::user();
        //授業情報関係
        $lecture = Lecture::updateOrCreate([
            'university_id' => $user_info->university_id,
            'fuculty_id' => $user_info->fuculty_id,
            'subject_id' => $user_info->subject_id,
            'name' => $request->name,
            //$idは何曜何限かの情報
            'day_id' => $id,
            //ここはperiod_idがいらないから後で削除、あとカラム名も決めなおさないとめっちゃわかりにくい
            'period_id' => $id
        ], [
            'teacher' => $request->teacher,
            'room_number' => $request->room
        ]);
        $lecture_id = $lecture->id;
        $day_id = $lecture->day_id;
        //ユーザーの時間割表更新
        $schedule = Schedule::where('user_id', $user_info->id)->first();
        $class_id = 'class_' . $day_id;
        $schedule->$class_id = $lecture_id;
        $schedule->save();
        
        return redirect()->route('schedules.index')->with('status', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

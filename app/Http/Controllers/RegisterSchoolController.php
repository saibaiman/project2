<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterSchoolController extends Controller
{
    public function selectPref(Request $request)
    {
        $request->session()->flush();
        $prefs = config('prefs');
        return view('auth.register_pref', compact('prefs'));
    }

    public function selectUniversity(Request $request)
    {
        $pref_id = $request->pref_id;
        if (!empty(config($pref_id))) {
            $schools = config($pref_id);
            $request->session()->put('pref_id', $pref_id);
        } else {
            return back()->with('error', '不正なエラーがありました。');   
        }
        return view('auth.register_university', compact('schools'));
    }

    public function selectFuculty(Request $request)
    {
        $root_by_pref = $request->session()->get('pref_id');
        $university_id = $request->university_id;
        $root = $root_by_pref . "." . $university_id;
        $fuculties = config($root);
        if (!empty($fuculties)) {
            $request->session()->put(['university_id' => $university_id, 'root' => $root]);
        } else {
            return back()->with('error', '学校が存在しません。');   
        }
        return view('auth.register_fuculty', compact('fuculties'));
    }

    public function selectClass(Request $request)
    {
        $fuculty_id = $request->fuculty_id;
        $root_by_class = $request->session()->get('root');
        $classes = config($root_by_class . ".class." . $fuculty_id);
        if (!empty($classes)) {
            $request->session()->forget('root');
            $request->session()->put('fuculty_id', $fuculty_id);
        } else {
            return back()->with('error', '不正なエラーがありました。');   
        }
        return view('auth.register_class', compact('classes'));
    }

}

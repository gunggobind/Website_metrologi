<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Attendance;
use App\Models\AttendanceAmercement;

class AttendanceController extends Controller
{
    public function index(){
        return view('backend.attendance.index', [
            'item' => Attendance::whereUserId(auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->first(),
            'items' => Attendance::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function store(){
        $data['user_id'] = auth()->user()->id;
        Attendance::create($data);
        return redirect()->route('backend.attendance')->with('success', 'Berhasil menambah data');
    }

    public function amercement(){
        return view('backend.attendance.amercement', [
            'item' => Attendance::whereUserId(auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->first(),
            'items' => AttendanceAmercement::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }
}

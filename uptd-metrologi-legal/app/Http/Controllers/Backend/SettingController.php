<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class SettingController extends Controller
{
    public function index(){
        return view('backend.setting.index', [
            'item' => Setting::first()
        ]);
    }

    public function update(Request $request){
        $data = $request->all();
        $item = Setting::first();
        Setting::first()->update($data);
        return redirect()->route('backend.setting')->with('success', 'Berhasil mengubah data');
    }
}

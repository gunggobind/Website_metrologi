<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Pengujian;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('backend.dashboard', [
            'pengujian' => Pengujian::count(),
        ]);
    }

    public function indexProfile(){
        return view('backend.profile');
    }

    public function UpdateProfile(Request $request){
        $item = User::find(auth()->user()->id);
        $data = $request->all();
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $item->password;
        }
        if($request->image){
            $data['image'] = Multipart::imageUpload($request->image);
        }else{
            $data['image'] = $item->image;
        }
        $item->update($data);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}

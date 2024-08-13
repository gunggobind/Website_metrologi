<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'unique:users'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['image'] = Multipart::imageUpload($request->image);
        for ($i=0; $i < 100; $i++) { 
            $alamat_bcn = str_replace("-","", Str::uuid());
            if (!User::whereAlamatBcn($alamat_bcn)->first()) {
                $data['alamat_bcn'] = $alamat_bcn;
                break;
            }
        }
        User::create($data);
        return redirect()->route('login')->with('success', 'Berhasil registrasi data, Silahkan login');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}

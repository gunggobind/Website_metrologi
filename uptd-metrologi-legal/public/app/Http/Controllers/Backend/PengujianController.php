<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pengujian;
use App\Models\PengujianAlat;
use App\Models\PengujianPenguji;

class PengujianController extends Controller
{
    public function index(){
        return view('backend.pengujian.index', [
            'items' => Pengujian::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create(){
        return view('backend.pengujian.create');
    }

    public function store(Request $request){
        $pengujian = Pengujian::create($request->all());
        return redirect()->route('backend.pengujian.edit', ['id' => $pengujian->id])->with('success', 'Berhasil menambah data');;
    }

    public function edit($id){
        return view('backend.pengujian.edit', [
            'item' => Pengujian::find($id)
        ]);
    }

    public function update(Request $request, $id){
        Pengujian::find($id)->update($request->all());
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function delete($id){
        Pengujian::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function pengujiStore(Request $request){
        PengujianPenguji::create($request->all());
        return redirect()->route('backend.pengujian.edit', ['id' => $request->pengujian_id])->with('success', 'Berhasil menambah data');;
    }

    public function pengujiDelete($id){
        PengujianPenguji::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');;
    }

    public function alatStore(Request $request){
        PengujianAlat::create($request->all());
        return redirect()->route('backend.pengujian.edit', ['id' => $request->pengujian_id])->with('success', 'Berhasil menambah data');;
    }

    public function alatDelete($id){
        PengujianAlat::find($id)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus data');;
    }
}

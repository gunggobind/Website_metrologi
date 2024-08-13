<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;
use App\Models\History;

class MemberController extends Controller
{
    public function index(){
        return view('backend.member.index', [
            'items' => User::whereRole(IS_MEMBER)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function edit($id){
        return view('backend.member.edit', [
            'item' => User::find($id),
        ]);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $item = User::find($id);
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $item->password;
        }
        if($request->image){
            $this->validate($request,[
                'image' => 'max:2024'
            ]);
            $data['image'] = Multipart::imageUpload($request->image);
        }else{
            $data['image'] = $item->image;
        }
        User::find($id)->update($data);
        return redirect()->route('backend.member')->with('success', 'Berhasil mengubah data');
    }

    public function delete($id){
        $item = User::find($id);
        $item->email = $item->email.'.delete';
        $item->save();
        $item->delete();
        return redirect()->route('backend.member')->with('success', 'Berhasil menghapus data');
    }

    public function history($id){
        return view('backend.member.history', [
            'member' => User::find($id)
        ]);
    }

    public function storeHistory(Request $request){
        $data = $request->all();
        History::create($data);
        $member = User::find($data['user_id']);
        $member->update([
            'token_bcn' => $member->token_bcn + $data['token_bcn']
        ]);
        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }
}

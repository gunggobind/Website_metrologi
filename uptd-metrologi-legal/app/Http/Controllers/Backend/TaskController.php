<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\User;
use App\Models\Task;
use App\Models\UserTask;

class TaskController extends Controller
{
    ## SOSMED ##
    public function indexSosmed(){
        return view('backend.task.sosmed.index', [
            'items' => Task::whereTipe(IS_TASK_SOSMED)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function createSosmed(){
        return view('backend.task.sosmed.create');
    }

    public function storeSosmed(Request $request){
        $data = $request->all();
        $data['tipe'] = IS_TASK_SOSMED;
        Task::create($data);
        return redirect()->route('backend.task-sosmed')->with('success', 'Berhasil menambahkan data');
    }

    public function editSosmed($id){
        return view('backend.task.sosmed.edit', [
            'item' => Task::find($id)
        ]);
    }

    public function updateSosmed(Request $request, $id){
        $data = $request->all();
        $item = Task::find($id);
        $item->update($data);
        return redirect()->route('backend.task-sosmed')->with('success', 'Berhasil mengubah data');
    }

    public function deleteSosmed($id){
        $item = Task::find($id);
        $item->delete();
        return redirect()->route('backend.task-sosmed')->with('success', 'Berhasil menghapus data');
    }

    ## VERIFIKASI SOSMED ##
    public function indexVerifikasiSosmed(){
        return view('backend.task.verifikasi-sosmed.index', [
            'items' => UserTask::whereWaktu(null)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function approveVerifikasiSosmed($id){
        $item = UserTask::find($id);
        $item->update(['status' => IS_APPROVE]);
        User::find($item->user_id)->update([
            'token_bcn' => User::find($item->user_id)->token_bcn + $item->task->token_bcn
        ]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    ## YOUTUBE ##
    public function indexYoutube(){
        return view('backend.task.youtube.index', [
            'items' => Task::whereTipe(IS_TASK_YOUTUBE)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function createYoutube(){
        return view('backend.task.youtube.create');
    }

    public function storeYoutube(Request $request){
        $data = $request->all();
        $data['tipe'] = IS_TASK_YOUTUBE;
        Task::create($data);
        return redirect()->route('backend.task-youtube')->with('success', 'Berhasil menambahkan data');
    }

    public function editYoutube($id){
        return view('backend.task.youtube.edit', [
            'item' => Task::find($id)
        ]);
    }

    public function updateYoutube(Request $request, $id){
        $data = $request->all();
        $item = Task::find($id);
        $item->update($data);
        return redirect()->route('backend.task-youtube')->with('success', 'Berhasil mengubah data');
    }

    public function deleteYoutube($id){
        $item = Task::find($id);
        $item->delete();
        return redirect()->route('backend.task-youtube')->with('success', 'Berhasil menghapus data');
    }

    ## FRONTEND ##

    public function createOrUpdate(Request $request){
        $task = Task::find($request->id);
        if($task->tipe == IS_TASK_SOSMED){
            $sosmed = UserTask::whereUserId(auth()->user()->id)->whereTaskId($task->id)->first();
            if($sosmed){
                $sosmed->update([
                    'username' => $request->username
                ]);
            }else{
                UserTask::create([
                    'user_id' => auth()->user()->id,
                    'task_id' => $task->id,
                    'username' => $request->username
                ]);
            }
            return redirect()->back()->with('success', 'Berhasil mengubah data');
        }else{
            $youtube = UserTask::whereUserId(auth()->user()->id)->whereTaskId($task->id)->whereDate('waktu', date('Y-m-d'))->first();
            if(!$youtube){
                UserTask::create([
                    'user_id' => auth()->user()->id,
                    'task_id' => $task->id,
                    'waktu' => date('Y-m-d')
                ]);
                User::find(auth()->user()->id)->update([
                    'token_bcn' => User::find(auth()->user()->id)->token_bcn + ($task->token_bcn/10)
                ]);
            }
            return redirect($task->link);
        }
    }
}

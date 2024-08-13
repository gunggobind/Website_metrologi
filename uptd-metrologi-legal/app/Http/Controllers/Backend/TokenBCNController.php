<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;
use Multipart;
use App\Models\User;
use App\Models\TopUp;
use App\Models\Transfer;
use App\Models\Withdraw;
use App\Models\Setting;
use App\Models\History;
use App\Models\HistorySavings;
use App\Payment\Tripay;
use Illuminate\Support\Facades\Crypt;

class TokenBCNController extends Controller
{
    ## CONVERT ##
    public function indexConvert(){
        return view('backend.token-bcn.convert.index', [
            'setting' => Setting::first()
        ]);
    }

    ## BUNGA ##
    public function indexBunga(){
        return view('backend.token-bcn.bunga.index', [
            'items' => HistorySavings::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    ## TABUNGAN ##
    public function indexTabungan(){
        return view('backend.token-bcn.tabungan.index');
    }

    public function createTabungan(){
        return view('backend.token-bcn.tabungan.create');
    }

    public function storeTabungan(Request $request){
        $data = $request->all();
        User::find(auth()->user()->id)->update([
            'token_bcn' => auth()->user()->token_bcn + $data['token_bcn'],
            'tabungan_bcn' => auth()->user()->tabungan_bcn - $data['token_bcn']
        ]);
        History::create([
            'user_id' => auth()->user()->id,
            'token_bcn' => $data['token_bcn']
        ]);
        return redirect()->route('backend.token-bcn.tabungan')->with('success', 'Berhasil menarik data');
    }


    ## DEPOSIT ##
    public function indexDeposit(){
        return view('backend.token-bcn.deposit.index', [
            'items' => auth()->user()->role == IS_ADMIN ? TopUp::orderBy('id', 'DESC')->get() : TopUp::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function createDeposit(){
        return view('backend.token-bcn.deposit.create', [
            'setting' => Setting::first()
        ]);
    }

    public function storeDeposit(Request $request){
        $data = $request->all();
        $result = Tripay::create($data);
        $results = json_decode($result, true);
        TopUp::create([
            'user_id' => auth()->user()->id,
            'token_bcn' => $data['token_bcn'],
            'nominal_bcn' => Setting::first()->nominal_bcn,
            'amount' => $data['amount'],
            'status' => IS_TRIPAY_UNPAID,
            'response' => json_encode($results['data'], true)
        ]);
        return redirect($results['data']['checkout_url']);
    }

    ## TRANSFER ##
    public function indexTransfer(){
        return view('backend.token-bcn.transfer.index', [
            'items' => auth()->user()->role == IS_ADMIN ? Transfer::orderBy('id', 'DESC')->get() : Transfer::whereUserId(auth()->user()->id)->orderBy('id', 'DESC')->get()
        ]);
    }

    public function createTransfer(){
        return view('backend.token-bcn.transfer.create');
    }

    public function storeTransfer(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        User::find(auth()->user()->id)->update([
            'token_bcn' => User::find(auth()->user()->id)->token_bcn - $data['jumlah']
        ]);
        User::whereAlamatBcn($data['alamat_bcn'])->first()->update([
            'token_bcn' => User::whereAlamatBcn($data['alamat_bcn'])->first()->token_bcn + $data['jumlah']
        ]);
        Transfer::create($data);
        return redirect()->route('backend.token-bcn.transfer')->with('success', 'Berhasil menambahkan data');
    }

    public function checkBcnAddress($data){
        if(User::whereAlamatBcn($data)->first()){
            return true;
        }else{
            return false;
        }
    }

    ## WITHDRAW ##
    public function indexWithdraw(){
        return view('backend.token-bcn.withdraw.index', [
            'items' => Withdraw::orderBy('id', 'DESC')->get()
        ]);
    }

    public function createWithdraw(){
        return view('backend.token-bcn.withdraw.create', [
            'setting' => Setting::first()
        ]);
    }

    public function storeWithdraw(Request $request){
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        $data['nominal'] = Setting::first()->nominal_bcn;
        $data['jumlah_nominal'] = $data['jumlah'] * Setting::first()->nominal_bcn;
        $withdraw = Withdraw::create($data);

        Mail::send('withdraw-verification', ['url' => Crypt::encryptString($withdraw->id)],
            function ($message)
            {
                $message->subject('[WITHDRAW VERIFICATION]');
                $message->from(env('MAIL_USERNAME'), 'Bancin Finance');
                $message->to(auth()->user()->email);
            }
        );
        return redirect()->route('backend.token-bcn.withdraw')->with('success', 'Berhasil menambah data, silahkan cek email anda untuk verifikasi');
    }

    public function editWithdraw($id){
        return view('backend.token-bcn.withdraw.edit', [
            'item' => Withdraw::find($id)
        ]);
    }

    public function updateWithdraw(Request $request, $id){
        $data = $request->all();
        $item = Withdraw::find($id);

        if($request->bukti_transfer){
            $this->validate($request,[
                'bukti_transfer' => 'max:2024'
            ]);
            $data['bukti_transfer'] = Multipart::imageUpload($request->bukti_transfer);
        }else{
            $data['bukti_transfer'] = $item->bukti_transfer;
        }

        $item->update($data);

        if ($request->status == IS_WITHDRAW_COMPLETED) {
            User::find($item->user_id)->update([
                'token_bcn' => User::find($item->user_id)->token_bcn - $item->jumlah
            ]);
        }

        return redirect()->route('backend.token-bcn.withdraw')->with('success', 'Berhasil mengubah data');
    }

    public function cancelWithdraw($id){
        Withdraw::find($id)->update(['status' => IS_WITHDRAW_CANCEL]);
        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }
}

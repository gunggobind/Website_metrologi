<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Setting;
use App\Models\Attendance;
use App\Models\HistorySavings;
use App\Models\AttendanceAmercement;

class CronController extends Controller
{
    public function bunga(){
        foreach (User::whereRole(IS_MEMBER)->get() as $member) {
            if(Attendance::whereUserId($member->id)->whereDate('created_at', date('Y-m-d'))->first()){
                $bunga = $member->token_bcn * (Setting::first()->bunga/100);
                $member->update([
                    // 'tabungan_bcn' => $member->tabungan_bcn + number_format($bunga, 1, '.', '')
                    'tabungan_bcn' => $member->tabungan_bcn + $bunga
                ]);
                HistorySavings::create([
                    'user_id' => $member->id,
                    // 'token_bcn' => number_format($bunga, 1, '.', '')
                    'token_bcn' => $bunga
                ]);
            }
        }
        return $this->responseSuccess('OK');
    }

    public function bungaAbsen(){
        foreach (User::whereRole(IS_MEMBER)->get() as $member) {
            if($member->tabungan_bcn > 0){
                $data = Attendance::whereUserId($member->id)->whereDate('created_at', Carbon::now()->format('Y-m-d'))->first();
                if(!$data){
                    $bunga = $member->tabungan_bcn * (Setting::first()->bunga_absen/100);
                    $member->update([
                        'tabungan_bcn' => $member->tabungan_bcn - $bunga
                    ]);
                    AttendanceAmercement::create([
                        'user_id' => $member->id,
                        'denda' => $bunga
                    ]);
                }
            }
        }
        return $this->responseSuccess('OK');
    }
}

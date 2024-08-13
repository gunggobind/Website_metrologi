<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Multipart;
use App\Models\Promo;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(Request $request){
        return $this->responseSuccess(auth()->user());
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'confirmed',
        ]);

        if ($validator->fails()) {
            return $this->responseFailed($validator->errors()->first());
        }

        $data = $request->all();
        $data['password'] = $request->password ? bcrypt($request->password) : auth()->user()->password;
        $data['image'] = $request->image ? Multipart::imageUpload($request->image) : auth()->user()->image;
        $data['background_image'] = $request->background_image ? Multipart::imageUpload($request->background_image) : auth()->user()->background_image;

        if($request->path() == 'api/store/profile/update'){
            $data['store_status'] = true;

            if(!Promo::whereStoreId(auth()->user()->id)->first()){
                Promo::create([
                    'store_id' => auth()->user()->id
                ]);
            }
        }

        auth()->user()->update($data);
        return $this->responseSuccess('OK');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    //
    public function index()
    {
        return view('auth.register',[
            'withoutLayout' => true
        ]);
    }

    public function post(RegisterPostRequest $request)
    {
        $inputs = $request->validated();

        $inputs['password'] = Hash::make($inputs['password']);

        try{
            $user = User::create([
                "first_name" => $inputs['first_name'],
                "last_name" => $inputs['last_name'],
                "national_code" => $inputs['national_code'],
                "gender" => $inputs['gender'],
                "military_service_status" => $inputs['military_service_status'],
                "mobile" => $inputs['mobile'],
                "email" => $inputs['email'],
                "username" => $inputs['username'],
                "password" => $inputs['password'],
            ]);
        }catch (Exception $exception){
            Log::error($exception);

            return backWithError("خطا رخ داد، مجدد تلاش کنید");
        }

        Auth::guard('web')->login($user);
        session(['password' => $request->input('password')]);

        return redirect()->route('send-email');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login', [
            'withoutLayout' => true
        ]);
    }

    public function post(LoginPostRequest $request)
    {
        $inputs = $request->validated();

        try {
            $user = User::query()
                ->where('email', $inputs['email'])
                ->first();

            if (Hash::check($inputs['password'], $user->password)) {
                Auth::guard('web')->login($user);
                session(['password' => $request->input('password')]);
            } else {
                return backWithError("کاربری با اطلاعات وارد شده یافت نشد!");
            }
        } catch (Exception $exception) {
            Log::error($exception);

            return backWithError("خطا رخ داد، لطفا مجد تلاش کنید.");
        }

        return redirect()->route('send-email');
    }
}

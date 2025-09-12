<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginPostRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('admin.auth.login', [
            'isLogin' => true
        ]);
    }

    public function post(LoginPostRequest $request)
    {
        $admin = Admin::query()
            ->where('email', $request->input('email'))
            ->first();

        if (empty($admin) && !Hash::check($request->input('password'), $admin->password)) {
            return backWithError('اطلاعات وارد شده اشتباه است');
        }

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }
}

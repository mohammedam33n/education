<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{

    public function loginPage()
    {
        return view('pages.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $dataLoginPage = $request->only(['email', 'password']);

        if (Auth::attempt($dataLoginPage)) {

            Alert::success('تم الدخول بنجاح');
            return redirect(route('admin.home'));
        } else {

            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.loginPage'));
    }
}
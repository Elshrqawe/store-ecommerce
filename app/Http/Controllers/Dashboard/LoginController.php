<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
//            notify()->success('تم التسجيل بنجاح');
            return redirect()->route('admin.dashboard');
        }

        //            notify()->success('خطا في البينات برجاء  المحاوله مجددا');
        return redirect()->back()->with(['error' => 'هناك خطا بالبينات']);


    }

    public function logout()
    {
        $gaurd = $this->getGaurd();
        $gaurd ->logout();
        return redirect()->route('admin.login');
    }

    private function getGaurd()
    {
        return auth('admin');
    }
}

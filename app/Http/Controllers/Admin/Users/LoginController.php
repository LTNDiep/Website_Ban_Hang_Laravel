<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng Nhập Admin'
        ]);
    }

    public function store(Request $request)
    {
         // dd($request->input()); //Liet ke tat ca gi da nhap vao
        $this->validate($request, [

            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if (Auth::attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ], $request->input('remember'))) {
                if (Auth::user()->id !== 1) {
                    Auth::logout();
                    Session::flash('error', 'Bạn không có quyền truy cập.');
                    return redirect()->back();
                }

            return redirect()->route('admin');
        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }
}

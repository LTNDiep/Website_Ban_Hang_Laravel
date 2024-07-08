<?php

namespace App\Http\Services\Account;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AccountService {

    //Tao tai khoan
    public function create($request)
    {
        try {
            $request->except('_token');
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Session::flash('success', 'Tạo tai khoan thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    //Cap nhat tai khoan
    public function update($request, $user)
    {
        try {
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật thông tin Lỗi');
            Log::info($err->getMessage());

            return false;
        }
        return true;
    }

    //Liet ke phan trang
    public function get()
    {
        return User::orderByDesc('id')->paginate(15);
    }

    //So luong tai khoan
    public function quantity()
    {
        return User::count();
    }


    //Xoa
    public function destroy($request)
    {
        $user = User::where('id', $request->input('id'))->first();
        if ($user) {
            $user->delete();
            return true;
        }
        return false;
    }

}



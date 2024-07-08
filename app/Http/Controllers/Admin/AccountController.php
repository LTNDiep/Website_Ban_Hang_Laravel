<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Services\Account\AccountService;
use Illuminate\Http\JsonResponse;

class AccountController extends Controller
{

    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function create()
    {
        return view('admin.account.add', [
            'title' => 'Thêm Tài Khoản Mới',
        ]);
    }

    //Tạo tài khoản
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users|email:filter',
                    'password' => 'required|string|min:8|confirmed',
                ]);

        $this->accountService->create($request);

        return redirect()->back();
    }

    //  Liet ke tai khoan
    public function index()
    {
        return view('admin.account.list', [
            'title' => 'Danh Sách Tài Khoản',
            'users' => $this->accountService->get()
        ]);
    }

    //Chỉnh sửa
    public function show(User $user)
    {
        return view('admin.account.edit', [
            'title' => 'Chỉnh Sửa Tài Khoản: ' . $user->name,
            'user' => $user
        ]);
    }

    //Cập nhật
    public function update(Request $request, User $user)
    {
        $result = $this->accountService->update($request, $user);
        if ($result) {
            return redirect('/admin/accounts/list');
        }
        return redirect()->back();
    }



    //Xoa tai khoản
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->accountService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa tài khoản thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

}

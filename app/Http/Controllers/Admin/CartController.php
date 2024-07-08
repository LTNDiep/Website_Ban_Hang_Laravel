<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    protected $cart;
    protected $customer;
    public function __construct(CartService $cart, CartService $customer)
    {
        $this->cart = $cart;
        $this->customer = $customer;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getAllCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    //Chỉnh sửa
    public function edit(Customer $customer)
    {
        return view('admin.carts.edit', [
            'title' => 'Cập nhật trang thái đơn hàng số: ' . $customer->id,
            'customer' => $customer,
        ]);
    }

    //Cập nhật
    public function update(Request $request, Customer $customer)
    {
        $result = $this->customer->updatestatus($request, $customer);
        if ($result) {
            return redirect('/admin/customers');
        }
        return redirect()->back();
    }

    // Xoa
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->cart->destroy($request);
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

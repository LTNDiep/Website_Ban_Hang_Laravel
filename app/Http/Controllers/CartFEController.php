<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class CartFEController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    // ---------------------------------------------------------------

    public function index(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('Auth.login')->with('error', 'Bạn cần đăng nhập trước.');
        }
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }

        return redirect('/carts');
    }
    // -----------------------------------------------------------

    public function show()
    {
        $products = $this->cartService->getProduct();

        if (Auth::check()) {

            $user = Auth::user();
        } else {
            return redirect()->route('Auth.login')->with('error', 'Bạn cần phải đăng nhập!');
        }

        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
            'user' => $user,

        ]);
    }
    // ---------------------------------------------------------

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect('/carts');
    }
    // --------------------------------------------------------

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }
    // --------------------------------------------------------
    public function addCart(Request $request)
    {
        // dd($request->input());
        $this->cartService->addCart($request);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Services\Account\AccountService;
use App\Http\Services\Review\ReviewService;
use App\Http\Services\CartService;


class AccountFEController extends Controller
{
    protected $accountService;
    protected $reviewService;
    protected $order;
    protected $cart;
    protected $customer;

    public function __construct(AccountService $accountService, ReviewService  $reviewService, CartService $order,
                                CartService $cart, CartService $customer)
    {
        $this->accountService = $accountService;
        $this->reviewService = $reviewService;
        $this->order = $order;
        $this->cart = $cart;
        $this->customer = $customer;
    }

    // --------------------Đăng nhập------------------------
    public function index()
    {
        return view('Auth.login', [
            'title' => 'Đăng Nhập '
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

            return redirect()->route('home');

        }

        Session::flash('error', 'Email hoặc Password không đúng');
        return redirect()->back();
    }

    //---------------- Đăng ký----------------------

    public function create()
    {
        return view('Auth.register', [
            'title' => 'Đăng ký'
        ]);
    }

    public function store1(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|email:filter',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Đăng nhập người dùng ngay sau khi đăng ký
        //  auth()->login($user);

        return redirect()->route('Auth.login');
    }
    // ---------------------- Đăng xuất------------------------------------------
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Chuyển hướng về trang chủ sau khi đăng xuất
    }

    // -------------------------- Thông tin tài khoản của 1 khách hàng-------------------------

    public function list(User $user)
    {
        if (Auth::check()) {
            $reviews = $this->reviewService->getReview_user();

            $user = Auth::user();
            return view('auth.list', [
                'title' => 'Thông Tin Tài Khoản',
                'user' => $user,
                'quantity_user_rw' => $this->reviewService->quantity_user_rw(),
                'quantity_user_order' => $this->order->quantity_user_order(),
                'customers' => $this->customer->getCustomer(),
                'reviews' => $reviews,

            ]);
        } else {
            return redirect()->route('Auth.login')->with('error', 'Bạn cần đăng nhập để xem thông tin tài khoản.');
        }
    }

    //--------------------------Cập nhật tài khoản-----------------------------------------
    public function update(Request $request, User $user)
    {
        $result = $this->accountService->update($request, $user);
        if ($result) {
            return redirect('Auth/list');
        }
        return redirect()->back();
    }

    //-----------------------Thông tin đơn hàng của 1 khách-----------------------------

    public function show(Customer $customer)
    {
        if (Auth::check()) {

            $user = Auth::user();
            $carts = $this->cart->getProductForCart($customer);

            return view('Auth.detail', [
                'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
                'user' => $user,
                'quantity_user_rw' => $this->reviewService->quantity_user_rw(),
                'quantity_user_order' => $this->order->quantity_user_order(),
                'customer' => $customer,
                'carts' => $carts
            ]);
        }else { return redirect()->route('Auth.login')->with('error', 'Bạn cần đăng nhập để xem thông tin tài khoản.'); }
    }

    // --------------------------Cập nật đã nhận hàng ----------------------------------

    public function updateStatus(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->status == 'Đã giao hàng thành công') {
            $customer->update(['status' => 'Đã nhận hàng']);
        }
        return redirect()->back()->with('success', 'Đã cập nhật trạng thái đơn hàng thành công.');
    }


}

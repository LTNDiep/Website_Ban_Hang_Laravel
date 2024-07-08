<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Jobs\SendMail;
use App\Models\User;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $product = Product::find($product_id);
        if ($qty > $product->quantity) {
            Session::flash('error', 'Số lượng tối đa của sản phẩm này là '.$product->quantity.'');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    // ----------------------------------------------------
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }
    //------------------------------------------------------------------------

    public function update($request)
    {
        $carts = Session::get('carts');

        foreach ($request->input('num_product') as $product_id => $qty) {
            $product = Product::find($product_id);

            // Kiểm tra nếu số lượng cập nhật lớn hơn số lượng trong kho
            if ($qty > $product->quantity) {
                Session::flash('error', 'Cập nhật lỗi, số lượng sản phẩm vượt quá số lượng cho phép');
                return false;
            }
            // Cập nhật số lượng trong giỏ hàng
            $carts[$product_id] = $qty;
        }

        Session::put('carts', $carts);
        return true;
    }


    //-------------------------------------------------------------------------

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }
    //------------------------------------------------------------------------


    public function addCart($request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $user_id = auth()->id();
            $customer = Customer::create([
                'user_id' => $user_id,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'pay'=> $request->input('pay'),
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            #Queue
            // SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }

    //------------------------------------------------------------------------

    protected function infoProductCart($carts, $customer_id)
    {
        $user_id = auth()->id();
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb', 'quantity')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $qtyOrdered = $carts[$product->id];

            if ($qtyOrdered > $product->quantity) {
                throw new \Exception(' Bạn chỉ được mua tối đa '. $product->quantity .' ' . $product->name . ' ');
            }
            $data[] = [
                'user_id' => $user_id,
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
            // Cập nhật số lượng sản phẩm trong kho

            $product->quantity = ($product->quantity - $qtyOrdered);
            $product->save();
        }
        return Cart::insert($data);
    }


    //------------------------------------------------------------------------

    public function getAllCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    //----------------------------------------------------------------------
    public function getCustomer()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                return Customer::where('user_id', $user->id)
                ->orderByDesc('created_at')
                ->get();
            } else {
                return 0;
            }
        }else {
            return collect();
        }
    }

    //------------------------------------------------------------------------

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }

    // ----------------------------------------------------------------------
    public function updatestatus($request, $customer)
    {
        try {
            $customer->fill($request->input());
            $customer->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    //------------------------------------------------------------------------

    //Xoa
    public function destroy($request)
    {
        $order = Customer::where('id', $request->input('id'))->first();
        if ($order) {
            $order->delete();
            return true;
        }
        return false;
    }
    //------------------------------------------------------------------------

    //So luong đon hang
    public function quantity()
    {
        return Customer::count();
    }

    // Số lượng đơn hàng của 1 khách
    public function quantity_user_order()
    {
        $user = Auth::user();
        if ($user) {
            return Customer::where('user_id', $user->id)->count();
        } else {
            return 0;
        }
    }
}

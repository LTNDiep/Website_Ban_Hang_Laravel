<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class statisticsController extends Controller
{
    public function index()
    {
        $totalQuantitySold = Cart::totalQuantitySold();
        $totalRevenue = Cart::totalRevenue();
        $totalQuantityProduct = Product::totalQuantityProduct();

        return view('admin.statistic.list', [
            'title' => 'Thống kê',
            'totalQuantitySold' => $totalQuantitySold,
            'totalQuantityProduct'=>$totalQuantityProduct,
            'totalRevenue' => $totalRevenue,
        ]);
    }
}

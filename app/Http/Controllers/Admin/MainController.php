<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Account\AccountService;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductAdminService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Article\ArticleService;
use App\Http\Services\CartService;
use App\Http\Services\Review\ReviewService;


class MainController extends Controller
{
    protected $user;
    protected $menu;
    protected $product;
    protected $slider;
    protected $article;
    protected $order;
    protected $review;

    public function __construct(AccountService $user, MenuService $menu, ProductAdminService $product,
                                SliderService $slider, ArticleService $article, CartService $order,
                                ReviewService  $review)
    {
        $this->user = $user;
        $this->menu = $menu;
        $this->product = $product;
        $this->slider = $slider;
        $this->article = $article;
        $this->order = $order;
        $this->review = $review;

    }

    public function index()
    {
        return view('admin.home', [

           'title' => 'Trang Quản Trị Admin',
           'account_quantity' => $this->user->quantity(),
           'menu_quantity' => $this->menu->quantity(),
           'product_quantity' => $this->product->quantity(),
           'slider_quantity' => $this->slider->quantity(),
           'article_quantity' => $this->article->quantity(),
           'order_quantity' => $this->order->quantity(),
           'review_quantity' => $this->review->quantity(),
        ]);
    }

}




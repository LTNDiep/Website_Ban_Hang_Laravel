<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Review\ReviewService;
use Illuminate\Support\Facades\Auth;

class ProductFEController extends Controller
{
    protected $productService;
    protected $reviewService;

    public function __construct(ProductService $productService, ReviewService  $reviewService)
    {
        $this->productService = $productService;
        $this->reviewService = $reviewService;
    }


    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $productsMore = $this->productService->more($id);
        $reviews = $this->reviewService->getAllReviewsByProductId($id);


        return view('products.content', [
            'title' => $product->name,
            'product' => $product,
            'products' => $productsMore,
            'reviews' => $reviews,
            'reviews_quantity' => $this->reviewService->reviewsquantity($id),

        ]);
    }

    //============================================= tìm kiem san pham =============================================
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Product::where('name', 'LIKE', "%$searchTerm%")
                           ->orWhere('description', 'LIKE', "%$searchTerm%")
                           ->get();

        $title = 'Tìm kiếm  "' . $searchTerm . '"';

        return view('products.search',[
        ], compact('products', 'title'));
    }

    //============================================= Đánh giá sản phẩm =============================================
    public function store(Request $request, $id)
    {

        if (!auth()->check()) {
            return redirect()->route('Auth.login')->with('error', 'Bạn cần đăng nhập trước khi đánh giá sản phẩm!');
        }

         $existingReview = ProductReview::where('user_id', auth()->id())
         ->where('product_id', $id)
         ->exists();

        if ($existingReview) {
        return redirect()->back()->with('error', 'Đánh giá thất bại - Bạn chỉ được đánh giá sản phẩm này 1 lần!');
        }
        // Check if the user has purchased the product
        $hasPurchased = Cart::where('user_id', auth()->id())
            ->where('product_id', $id)
            ->whereHas('customer', function ($query) {
                $query->where('status', 'Đã nhận hàng');
            })
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'Chỉ được đánh giá khi đã hoàn tất mua sản phẩm!');
        }


        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Create review
        $review = new ProductReview();
        $review->user_id = auth()->id();
        $review->product_id = $id;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đánh giá sản phẩm!');
    }


}

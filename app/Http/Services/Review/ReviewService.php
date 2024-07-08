<?php


namespace App\Http\Services\Review;

use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;


class ReviewService
{

    public function getAllReviewsByProductId($productId)
    {
        return ProductReview::where('product_id', $productId)->get();
    }

    //Liệt kê đanh gia cua 1 nguoi dùng
    public function getReview_user()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                return ProductReview::where('user_id', $user->id)
                ->orderByDesc('created_at')
                ->get();
            } else {
                return 0;
            }
        }else {
            return collect();
        }
    }

    // Liệt kê tất cả đánh giá
    public function get()
    {
        return ProductReview::orderByDesc('id')->paginate(15);
    }

    //Xoa
    public function destroy($request)
    {
        $review = ProductReview::where('id', $request->input('id'))->first();
        if ($review) {
            $review->delete();
            return true;
        }
        return false;
    }

    //Số review của từng sp
    public function reviewsquantity($productId)
    {
        return ProductReview::where('product_id', $productId)->count();
    }

    //Số lượng tất cả review
    public function quantity()
    {
        return ProductReview::count();
    }

    //Số lượng review của 1 nguoi dung
    public function quantity_user_rw()
    {
        $user = Auth::user();
        if ($user) {
            return ProductReview::where('user_id', $user->id)->count();
        } else {
            return 0;
        }
    }
}

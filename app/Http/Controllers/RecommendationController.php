<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{

    public function recommend(Request $request)
    {
        if (Auth::check()) {

            $userId = Auth::id();

            $output = shell_exec("python CF3.py");


            // Chuyển đổi kết quả từ chuỗi thành mảng PHP
            $recommendations = json_decode($output, true);

            $userRecommendations = $recommendations[$userId] ?? [];
            // return  $userRecommendations;

            // Kiểm tra nếu mảng gợi ý có rỗng?
            if (empty($userRecommendations)) {

                // $products = Product::all();
                // return redirect()->route('home')->with('error', 'Xin lỗi, chưa có sản phẩm gợi ý cho bạn');
                $products = collect();
                $message = 'Xin lỗi, Hiện chưa có sản phẩm gợi ý dành cho bạn!';
            } else {

                // Lấy danh sách sản phẩm dựa trên gợi ý cho người dùng hiện tại
                $products = Product::whereIn('id', $userRecommendations)->get();
                $message = null;
            }
            $title = 'Sản phẩm gợi ý';

            return view('recommend', compact('products', 'title', 'message'));


        } else {
            return redirect()->route('Auth.login')->with('error', 'Bạn cần đăng nhập trước.');
        }
    }


}

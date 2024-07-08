<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Review\ReviewService;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    protected $reviewService;

    public function __construct( ReviewService  $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function index()
    {
        return view('admin.review.list', [
            'title' => 'Danh Sách Tài Khoản',
            'reviews' => $this->reviewService->get()
        ]);
    }

    //Xoa tai khoản
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->reviewService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa đánh giá khoản thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}


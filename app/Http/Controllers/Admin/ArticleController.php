<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Services\Article\ArticleService;
use App\Http\Requests\Article\ArticleRequest;


class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }
    //------------------------------------------------------------
    public function create()
    {
        return view('admin.article.add', [
           'title' => 'Thêm Bài Viết Mới'
        ]);
    }
    //------------------------------------------------------------

    public function store(ArticleRequest $request)
    {

        $this->articleService->insert($request);

        return redirect()->back();
    }
    //------------------------------------------------------------

    public function index()
    {
        return view('admin.article.list', [
            'title' => 'Danh Sách Bài Viết',
            'articles' => $this->articleService->get()
        ]);
    }
    //------------------------------------------------------------

    public function show(Article $article)
    {
        return view('admin.article.edit', [
            'title' => 'Chỉnh Sửa Bài viết: ' . $article->name,
            'article' => $article
        ]);
    }
    //------------------------------------------------------------

    public function update(Request $request, Article $article)
    {

        $result = $this->articleService->update($request, $article);
        if ($result) {
            return redirect('/admin/articles/list');
        }

        return redirect()->back();
    }
    //------------------------------------------------------------

    public function destroy(Request $request)
    {
        $result = $this->articleService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công!'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }

}

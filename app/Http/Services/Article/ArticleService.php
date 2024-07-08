<?php

namespace App\Http\Services\Article;

use App\Models\Article;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ArticleService {

    public function insert($request)
    {
        try {
            $request->except('_token');
            Article::create($request->input());
            Session::flash('success', 'Thêm bài viết thành công');

        } catch (\Exception $err) {
            Session::flash('error', 'Thêm bài viết lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    //------------------------------------------------------------

    public function get()
    {
        return Article::orderByDesc('id')->paginate(15);
    }

    //So luong bai viet
    public function quantity()
    {
        return Article::count();
    }

    //------------------------------------------------------------

    public function update($request, $Article)
    {
        try {
            $Article->fill($request->input());
            $Article->save();
            Session::flash('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật bài viết Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    //------------------------------------------------------------

    public function destroy($request)
    {
        $article = Article::where('id', $request->input('id'))->first();
        if ($article) {
            $path = str_replace('storage', 'public', $article->thumb);
            Storage::delete($path);
            $article->delete();
            return true;
        }

        return false;
    }
 //------------------------------------------------------------

    public function show()
    {
        return Article::where('active', 1)->orderByDesc('sort_by')->get();
    }


}

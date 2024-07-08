<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Article\ArticleService;
use App\Http\Services\Menu\MenuService;

class BlogController extends Controller
{
    protected $articleService;
    protected $menu;

    public function __construct(ArticleService $articleService, MenuService $menu)
    {
        $this->articleService = $articleService;
        $this->menu = $menu;
    }
    public function index()
    {
        return view('blog', [

           'title' => 'Trang BLOG',
           'articles' => $this->articleService->get(),
           'menus' => $this->menu->show(),
        ]);
    }
}

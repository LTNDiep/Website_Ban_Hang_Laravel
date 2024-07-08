<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MenuService
{
    //Tạo menu
    public function create($request)
    {
        try {
            $request->except('_token');
            Menu::create([
                'name' => (string)$request->input('name'),
                'parent_id' => (int)$request->input('parent_id'),
                'description' => (string)$request->input('description'),
                'content' => (string)$request->input('content'),
                'active' => (string)$request->input('active'),
                'thumb' => (string)$request->input('thumb')
            ]);

            Session::flash('success', 'Tạo danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }
    //------------------------------------------------------------

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }


    // phan trang menu
    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    //So luong menu
    public function quantity()
    {
        return Menu::count();
    }

    //----------------------------------------------------------------

    //Cap nhat danh muc da chinh sua
    public function update($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int)$request->input('parent_id');
        }

        $menu->name = (string)$request->input('name');
        $menu->description = (string)$request->input('description');
        $menu->content = (string)$request->input('content');
        $menu->active = (string)$request->input('active');
        $menu->thumb = (string)$request->input('thumb');
        $menu->save();

        Session::flash('success', 'Cập nhật thành công Danh mục');
        return true;
    }

    // Xoa danh muc
    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $parentMenu = Menu::where('id', $id)->first();
        $childMenus = Menu::where('parent_id', $id)->get();

        if ($parentMenu) {
            $parentPath = str_replace('storage', 'public', $parentMenu->thumb);
            Storage::delete($parentPath);

            foreach ($childMenus as $childMenu) {
                $childPath = str_replace('storage', 'public', $childMenu->thumb);
                Storage::delete($childPath);
            }
            Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
            return true;
        }
        return false;
    }
    //-----------------------------------------------------------------------

    //Menu trang chủ
    public function show()
    {
        return Menu::select('name', 'id', 'thumb')
            ->where('parent_id', 0)
            ->orderbyDesc('id')
            ->get();
    }

    //Trang danh mục sản phẩm
    public function getId($id)
    {
        return Menu::where('id', $id)->where('active', 1)->firstOrFail();
    }


    public function getProduct($menu, $request)
    {
        $query = $menu->products()
            ->select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1);

        if ($request->input('price')) {
            $query->orderBy('price', $request->input('price'));
        }

        return $query
            ->orderByDesc('id')
            ->paginate(12)
            ->withQueryString();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //All Product
    public function index()
    {
        $products = DB::table('products')
        ->orderByDesc('id')
        ->paginate(9);
        return view('pages.product.index', compact('products'));
    }

    //ByCategory
    public function byCategory($slugID)
    {
        $arraySlugID = explode("-", $slugID);
        $id = array_pop($arraySlugID);

        if ($id) {
            # code...
            $category = DB::table('categories')->where('id', $id)->select('c_name')->get();

            $products = DB::table('products')->where('pro_category_id', $id)->orderByDesc('id')->paginate(9);

            return view('pages.product_by_cat.index', compact('products', 'category'));
        }
        return view(404);
    }

    //Detail Product
    public function detailProduct($slug, $id)
    {   
        //Theo id sản phẩm
        $product = DB::table('products')->where('id', $id)->get();

        //Cùng chuyên mục
        $relatedPro = DB::table('products')->where('pro_category_id', $product[0]->pro_category_id)->get();
        return view('pages.product_detail.index', compact('product', 'relatedPro'));
    }
}

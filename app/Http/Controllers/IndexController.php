<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Pagination\Paginator;

class IndexController extends Controller
{
    //
    public function index(){


        $products = \App\Models\Product::paginate(12);
        // $products = \App\Models\Product::simplePaginate(12);
        // $products = \App\Models\Product::cursorPaginate(12);
        return view('welcome',compact('products'));
    }

    public function productWithCategory($category_id){
        $productCategory = Product::where('category_id',$category_id)->get();
        // return $productCategory;
        return view('productCategory',compact('productCategory'));
    }
    public function productWithTag($tag_id){
        $tag = Tag::find($tag_id);
        $products = $tag->products;

        return view('productTag',compact('products'));
    }
}

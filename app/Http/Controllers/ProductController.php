<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Str;
use DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $prodcuts = DB::select('select * from products left join categories on product.category_id = categories.id');
        $products = Product::orderBy('id','DESC')->get();
        // $products = Product::withTrashed()->orderBy('id','DESC')->get();
        $trashes = Product::onlyTrashed()->orderBy('id','DESC')->get();
        // $products = Product::all();

        return view('product.index',compact('products','trashes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::get();
        $data = ['test'];

        return view('product.create',compact('categories','data'));
        // return view('product.create',[
        //     'cat' => $categories,
        //     'd' => $data
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // Product::create($request->all());

        // return $request->file('cover')->store('images');
        // return $request->file('cover')->storeAs('images','asdf');

        if($request->file('cover')){
            $ext = $request->file('cover')->getClientOriginalExtension();
            $cover = Str::uuid().'.'.$ext;
            $request->file('cover')->storeAs('images',$cover,'public');
        }else{
            $cover = null;
        }

        $product = new Product;
        // $product->title = $request->title;
        // $product->fill([
        //     'title' => $request->title,
        // ]);


        $product->fill($request->all());
        $product->cover = $cover;
        $product->save();

        $tags = explode(',',$request->tag);
        // return $tags;
        foreach($tags as $tag){
            $tagData = Tag::firstOrCreate(['title' => $tag]);
            // Tag::Create(['title' => $tag]);
            $product->tags()->attach($tagData -> id);
        }

        return redirect()->route('product.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        // $product = Product::find($product->id);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories = Category::get();
        return view('product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        $product->fill($request->all());
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        // Product::destroy($product->id);

        return redirect()->route('product.index');
    }
    public function removeCover(Request $request,Product $product){

        // return '/storage/images/'.$product->cover;
        Storage::disk('public')->delete('images/'.$product->cover);

        // $product->cover = null;
        // $product->save();

        // return $product;
        // DB::table('products')->where('id',$request->id)->update([
        //     'cover' => null
        // ]);

        // DB::update('update products set cover = ? where id = ?',[null,$request->id]);

        return redirect()->back();
    }
    public function restore($id){
        Product::onlyTrashed()->find($id)->restore();
        return redirect()->back();
    }
    public function forceDelete(Request $request){
        Product::onlyTrashed()->find($request->id)->forceDelete();
        return redirect()->back();
    }

}

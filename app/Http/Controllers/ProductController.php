<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use Symfony\Component\Console\Input\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['products'] = Product::where('user_id',auth()->user()->id)->with('category')->get();
        return view('dashboard.products.view_all_products')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.add_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->storePublicly('images', ['disk' => 'public']);
        $data['user_id'] = auth()->user()->id;
        Product::create($data);
//        for ($i=0; $i <= 1000; $i++){
//            Mail::send('mail.test', $data, function ($message) {
//                $message->to('meharmsufyan7896@gmail.com')->subject("Order Placed Successfully!");
//            });
//        }
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('edit_product')->with(['product' => $product]);
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
        $product->fill($request->except('_token'))->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->back();
    }
    public function add(Product $product)
    {

        return view('VIEW CART')->with();
    }
    public function search(Request $request){
        if(isset($request->search)){
            $product = Product::where('name','LIKE', "%$request->search%")->orderBy('name');
        }
        elseif (Input::has('search')){
            $product = Product::whereHas('search-price');
            $product->where('price','LIKE',"%$product%");
        }
    }
}

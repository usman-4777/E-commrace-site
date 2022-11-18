<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class HomeController extends Controller
{
    public function getProducts(Request $request)
    {
//        $data['order'] = Item::with('product', 'order')->first();
//        $email =Mail::send('mail.order', $data, function ($message) {
//           $message->to('ashrafusman768@gmail.com')->subject("Order Placed Successfully!");
//        });
        $orders = Order::all();
        foreach ($orders as $order) {
            if($order->order_items) {
                dd($order->order_items);

            }
        }
        if($request->input('search')) {
            $search = $request->input('search');
            $data['products'] = Product::with('category')
                ->where('name', 'LIKE', "%{$search}%")->get();
            return view('website.index')->with($data);
        }
        else{
            $data['products'] = Product::with('category')->get();
            return view('website.index')->with($data);
        }
    }
   public function getprice(Request $request)
   {
       if ($request->input('search')){
           $search = $request->input('search');
           $data['products'] = Product::with('category')->where('price', 'LIKE', "%{$search}%")->get();
           return view('website.index')->with('$data');
       }
   }
   public function viewcart(Request $request)
   {
       return view('viewcart');
   }
   public function order(Request $request)
   {
       $orders = Item::with('product', 'order')->get();
       return view('order', compact('orders'));
   }
 }

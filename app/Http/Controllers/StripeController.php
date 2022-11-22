<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe;
class StripeController extends Controller
{
    public function stripePost(Request $request)
    {
        foreach ((array) session ('cart') as $cart){
            $subtotal[] = (int) $cart['quantity'] * (int) $cart['price'];
            $discount[] = (int) $cart['price'] - ((int) $cart['discount']/100) * (int) $cart['price'];
        }
//        dd($subtotal);
        $total = array_sum($subtotal) - array_sum($discount);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * $total,
            "currency" => "usd",
            "source" => $request->stripeToken,
        ]);
        $order = $this->saveOrder($total);
        $orderItems = $this->saveOrderItems($order->id);
        $this->sendMail($order);
        return redirect()->back()->with('Payment Successfully');
    }

    private function saveOrder($total)
    {
        $data['user_id'] = auth()->user()->id;
        $data['total_price'] = $total;
        $data['ref_id'] = '#'. random_int(10000, 99999);
        return Order::create($data);
    }

    private function saveOrderItems($id)
    {
        foreach ((array) session('cart') as $cart){
            $data['order_id'] = $id;
            $data['product_id'] = $cart['id'];
            $data['quantity'] = $cart['quantity'];
            $data['unit_price'] = $cart['price'];
            $data['total_price'] = $cart['quantity'] * $cart['price'];
            $data['discount'] = $cart['discount'] ;
            Item::create($data);
        }
//        return session()->forget('cart');
    }
    private function sendMail($order)
    {
        $data['orders'] = Item::where('order_id', $order->id)->with('order', 'product')->get();
        Mail::send('mail.order', $data, function ($message) {
            $message->to(auth()->user()->email)->subject("Order Placed Successfully!");
        });
    }

}

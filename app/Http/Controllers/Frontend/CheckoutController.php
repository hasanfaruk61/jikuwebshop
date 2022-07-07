<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index(){

        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id', $item->product_id)->where('quantity', '>=', $item->product_qty)->exists())
            {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout' , compact('cartitems'));
    }

    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->zip_code = $request->input('zip_code');
        $order->save();

        // To Calculate the Total Price
        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems_total as $product)
        {
            $total += $product->products->sellingPrice;

        }

        $order->total_price = $total;
        $order->save();


        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id'=> $order->id,
                'product_id'=> $item->product_id,
                'quantity'=>$item->product_qty,
                'price'=> $item->products->sellingPrice
            ]);

            $product = Product::where('id', $item->product_id)->first();
            $product->quantity = $product->quantity - $item->product_qty;
            $product->update();
        }
        if(Auth::user()->address1 == NULL)
        {
            $user = User::where('id',Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->country = $request->input('country');
            $user->zip_code = $request->input('zip_code');
            $user->update();

        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        return redirect('/')->with('status', "Order placed successfully!");

    }
}

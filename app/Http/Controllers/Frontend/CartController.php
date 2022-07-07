<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

public class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $product_check = Product::where('id', $product_id)->first();
            if($product_check)
            {
                if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $product_check->name." Already in Cart!"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->product_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->product_qty = $product_qty;
                    $cartItem->save();
                    return response()->json(['status' => $product_check->name." Added to cart!"]);
                }
            }
            else
            {
                return response()->json(['status' => "Login to continue"]);
            }
        }
    }

    public function view_cart()
    {

        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function update_cart(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $cart =Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->product_qty = $product_qty;
                $cart->update();
                return response()->json(['status'=> "Quantity updated"]);
            }

        }
    }



    public function delete_product(Request $request)
    {
        if(Auth::check())
        {
            $product_id = $request->input('product_id');
            if(Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();
                return response()->json(['status' => "Product deleted successfully!"]);

            }
            else
            {
                 return response()->json(['status' => "Login to continue!"]);
            }
        }
    }

    public function cart_count()
    {
        $cartcount = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }

}

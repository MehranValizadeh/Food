<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
//        session()->forget('cart');
//        session()->remove('cart');
        return view('cart');
    }

    public function addToCart($id)
    {

        $food = Food::find($id);

        if (!$food) {
            echo "غذا پیدا نشد";
            return false;
        }

        $cart = session()->get('cart');
        $cart_array = json_decode($cart, true);
        if (!isset($cart_array['total_price'])){
            $cart_array['total_price'] = 0;
        }
        if (isset($cart_array['foods'][$id])) {
            $cart_array['foods'][$id]['count']++;
            $cart_array['total_price'] += $cart_array['foods'][$id]['price'];
            $cart_json = json_encode($cart_array, JSON_UNESCAPED_UNICODE);
            session()->put('cart', $cart_json);
            return redirect(route('cart'));
        } else {
            $cart_array['foods'][$id] = [
                'name' => $food->name,
                'image' => $food->image,
                'price' => $food->price,
                'count' => 1,
            ];
            $cart_array['total_price'] += $food->price;
            $cart_json = json_encode($cart_array, JSON_UNESCAPED_UNICODE);
            session()->put('cart', $cart_json);
            return redirect(route('cart'));
        }

    }
}

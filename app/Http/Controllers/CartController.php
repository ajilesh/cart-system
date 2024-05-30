<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartProduct = Cart::getContent();
        return view('cart.index',compact('cartProduct'));
    }
    public function add($id)
    {
        $product = Product::find($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'description' => $product->description,
                'image' => $product->image,
            ]
        ]);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }
    public function remove($id)
    {
        Cart::remove($id);
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
    public function increment($id)
    {
        Cart::update($id,[
            'quantity' => 1
        ]);
        return redirect()->back();
    }
    public function decrement($id)
    {
        $item = Cart::get($id);

        if ($item->quantity > 1) {
            Cart::update($id, array(
                'quantity' => -1, // decrement by 1
            ));
        } else {
            Cart::remove($id);
        }
        return redirect()->back();
    }
}

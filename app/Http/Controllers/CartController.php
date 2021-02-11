<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    public function _construct()
    {
        if(!\Session::has('cart')) \Session::put('cart', array()); // si no existe la vaiable la crea y creo un array
    }
    //show
    public function show()
    {
      $cart=\Session::get('cart');
      $total = $this->total();
      return view('tienda.cart', compact('cart', 'total'));
    }
    //Add
    public function add($id)
    {
        $producto=Producto::find($id);
        $product=$producto->unidades;
        $cart= \Session::get('cart');
        $producto->quantity=1;
        $cart[$producto->id]=$producto;
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }
    //Delete item
    public function delete($id)
    {
      $producto=Producto::find($id);
      $cart= \Session::get('cart');
      unset($cart[$producto->id]);
      \Session::put('cart', $cart);
      return redirect()->route('cart-show');
    }

    // Update item
    public function update($id,$quantity)
    {
      $producto=Producto::find($id);
      $cart= \Session::get('cart');
      $cart[$producto->id]->quantity=$quantity;
      return redirect()->route('cart-show');
    }
    // Trash cart
    public function trash()
    {
      \Session::forget('cart');
      return redirect()->route('cart-show');
    }
    // Total
    private function total()
    {
      $cart= \Session::get('cart');
      $total=0;
      foreach ($cart as $item) {
        $total+=$item->precio * $item->quantity;
      }
      return $total;
    }
}

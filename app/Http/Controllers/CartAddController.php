<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartAddController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // /* It's dumping the request object. */
        // dd($request);
        //session key, tähistab array'd ehk cart = [products]
        $session_key = 'cart.product' . $request->product['id'];
        //dd(session()->get('cart'));
        /* Adding a product to the cart. */
        if (session()->has($session_key)) {
            $cart_row = session()->get($session_key);
            $cart_row['qty'] = $cart_row['qty'] += $request->qty;
            $cart_row['total'] = $cart_row['qty'] * $cart_row['price']['amount'];
            session()->put($session_key, $cart_row);
        } else {
            $session_data = [
                'qty' => $request->qty,
                'total' => Money($request->qty * $request->product['price']['amount'])
            ];
            
            $session_data = array_merge($request->product, $session_data);
            session()->put($session_key, $session_data);
        }
        return redirect()->back();
    }
}
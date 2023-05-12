<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartRemoveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    /**
     * It renders the Shop/Cart view with the products paginated
     * 
     * @param Request request The request object.
     * 
     * @return The Shop/Cart view with the products paginated.
     */
        // removes the item from the cart
        session()->forget('cart.product' . $request->product['id']);
        return redirect()->back();
    }
}

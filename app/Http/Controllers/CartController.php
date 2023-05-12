<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
      $data = collect(session()->get('cart'))->map(function($product){
        //dd($product["price"]);
        return [
          'price_data' => [
            'currency' => 'eur',
            'product_data' => [
              'name' => $product["name"],
            ],
            'unit_amount' => $product["price"]["amount"],
          ],
          'quantity' => $product["qty"],
        ];
      });
      //dd($data->values()->all());
      \Stripe\Stripe::setApiKey("sk_test_pjdpPizIjqvq5MF7tJvb7mZO");
        $checkout_session = \Stripe\Checkout\Session::create([
          'line_items' => $data->values()->all(),
            'mode' => 'payment',
            'success_url' => route("shop.index"),
            'cancel_url' => route("shop.index"),
          ]);
          
          return redirect($checkout_session->url);
        /* Rendering the Shop/Cart view with the products paginated. */
        /*return Inertia::render('Shop/Cart', [
            'cart' => ,
        ]);*/
    }
}
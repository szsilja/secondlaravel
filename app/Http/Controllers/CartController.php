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
        /* Rendering the Shop/Cart view with the products paginated. */
        return Inertia::render('Shop/Cart', [
            'products' => Product::paginate(6)
        ]);
    }
}
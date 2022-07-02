<?php

namespace App\API\Controllers;

use App\Http\Controllers\Controller;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsApiController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required'
        ]);
        $product = Auth::user()->product()->create($request->except('_token'));
        $product->categories()->attach($request->get('category_id'));
        return $product;
    }
    public function show($id)
    {
        return Product::findOrFail($id);

    }
    public function index()
    {
        return  Product::with('user')->get();

    }
}

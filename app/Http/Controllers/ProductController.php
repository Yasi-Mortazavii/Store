<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreBlogPost;
use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kavenegar\KavenegarApi;
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'edit']);
    }

    public function index()
    {
        $products = Product::with('user')->get();
        return view('product.index', compact('products'));
    }



    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }



    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request  $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'weight' => 'required'
        ]);
        $product = Auth::user()->product()->create($request->except('_token'));
        $product->categories()->attach($request->get('category_id'));

        $client = new KavenegarApi(env('KAVEH_NEGAR_API_KEY'));
        $client->send(env('SENDER_MOBILE'), env('RESIVER_MOBILE'),' دانشجوی گرامی باتوجه به نزدیک شدن به امتحانات پایانی لطفا هر چه سریعتر  جهت تایید مدارک خود اقدام نمایید
       ');
        return redirect('/product');
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = product::find($id);
        $this->authorize('update', $product);
//        abort_if(($product->user->id != Auth::user()->id), HttpResponse::HTTP_UNAUTHORIZED);
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = product::find($id);
        $product->update($request->only('name', 'description', 'weight', 'price'));
        $product->categories()->sync($request->get('category_id'));
        return redirect('/product');
    }
}

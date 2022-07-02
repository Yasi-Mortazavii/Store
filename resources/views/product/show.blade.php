@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Name : {{$product->name}}</h1>
        <p>Description :  {{$product->description}}</p>
        <p>Price : {{$product->price}}</p>
        <p>Weight : {{$product->weight}}</p>
        <p>Owner  : {{$product->user->name}}</p>
    @foreach($product->categories as $category)
        {{$category->name . ','}}
    @endforeach
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container col-6">
        <h1>product</h1>
        <table class="table">
            <tr>
                <th>Product Name</th>
                <th>Creator</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>
                        <a href={{"/product/" . $product->id}}>
                            {{$product->name}}
                        </a>
                    </td>
                    <td>
{{--                        {{$product->user->name}}--}}
                    </td>
                    @can('update', $product)
                        <td>
                            <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-primary">Update</a>
                        </td>
                    @else
                        <td>  </td>
                    @endcan
                </tr>
            @endforeach
        </table>
        <a href="{{route('product.create')}}" class="btn btn-success btn-block ">Create</a>
    </div>
@endsection
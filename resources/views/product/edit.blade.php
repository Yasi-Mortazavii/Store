@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('product.update', ['id' => $product->id])}}">
            {{csrf_field()}}
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" id="name" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{$product->description}}" class="form-control" id="description">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{$product->price}}" class="form-control" id="price">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id[]" id="category" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option
                                value="{{$category->id}}"
                                {{ $product->categories->contains( 'id' , $category->id) ? 'selected' : '' }}

                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" name="weight" value="{{$product->weight}}" class="form-control" id="weight">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        @include('errors.validation_error')
    </div>
@endsection
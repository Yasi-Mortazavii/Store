@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('products.store')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" >
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" value="{{old('description')}}" class="form-control" id="description">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" value="{{old('price')}}" class="form-control" id="price">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id[]" id="category" class="form-control" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" name="weight" value="{{old('weight')}}" class="form-control" id="weight">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        @include('errors.validation_error')
    </div>
@endsection
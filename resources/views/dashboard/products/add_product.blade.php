@extends('layouts.dashboard')
@section('content')
    <div class="container mt-3">
        <h2>Add products</h2>
        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>

            <div class="mb-3 mt-3">
                <label for="category_id">Select Category</label>
                <select name="category_id" class="form-control" id="">
                    <option selected hidden>Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3 mt-3">
                <label for="price">Price:</label>
                <input type="price" class="form-control" id="price" placeholder=" price" name="price">
            </div>


            <div class="mb-3 mt-3">
                <label for="quantity">Quantity:</label>
                <input type="quantity" class="form-control" id="quantity" placeholder="Quantity" name="quantity">
            </div>


            <div class="mb-3 mt-3">
                <label for="discount">Discount:</label>
                <input type="discount" class="form-control" id="discount" placeholder="Discount" name="discount">
            </div>

            <div class="mb-3 mt-3">
                <label for="image">image:</label>
                <input type="file" class="form-control" id="name" placeholder="Enter Name" name="image">
            </div>


    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection

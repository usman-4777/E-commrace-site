    @extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2> Edit Product</h2>
        <form method="post" action="{{ route('products.update', [$product->id])}}" enctype="multipart/form-data">
            @csrf
            @if($product)
                @method('put')
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                       value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category_id:</label>
                <input type="category_id" class="form-control" id="category_id" placeholder="Category_id"
                       value="{{ $product->category_id}}" name="category_id">
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="price" class="form-control" id="price" placeholder="Price" value="{{ $product->price}}"
                       name="price">
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="quantity" class="form-control" id="quantity" placeholder="Quantity"
                       value="{{ $product->quantity}}" name="quantity">
            </div>

            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="discount" class="form-control" id="discount" placeholder="Discount"
                       value="{{ $product->discount}}" name="discount">
            </div>


            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="image" value="{{ $product->image}}"
                       name="image">
            </div>


            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

@endsection

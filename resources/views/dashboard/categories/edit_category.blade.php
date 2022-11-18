@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2> Edit Form</h2>
        <form method="post" action="{{ route('categories.update', [$category->id]) }}">
            @csrf
            @if ($category)
                @method('put')
            @endif

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                       value="{{ $category->name }}">
            </div>


            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

@endsection

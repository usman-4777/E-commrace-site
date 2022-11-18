@extends('layouts.dashboard')
@section('content')
    <div class="container mt-3">
        <h2>Manage Categories form</h2>
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Name" name="name">
            </div>

    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection

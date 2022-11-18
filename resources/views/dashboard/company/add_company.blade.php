@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Add Company</h2>
        <form method="post" action="{{ route('companies.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                       placeholder="Name" name="name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Ceo:</label>
                <input type="text" class="form-control @error('ceo') is-invalid @enderror" id="ceo"
                       placeholder="CEO" name="ceo">
                @error('ceo')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">City:</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="City"
                       name="city">
                @error('city')
                <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection



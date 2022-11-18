        @extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2> Edit Form</h2>
        <form method="post" action="{{ route('companies.update', [$company   ->id]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                       value="{{ $company->name }}">
            </div>
            <div class="form-group">
                <label for="pwd">Ceo:</label>
                <input type="text" class="form-control" id="ceo" placeholder="ceo" value="{{ $company->ceo}}"
                       name="ceo">
            </div>

            <div class="form-group">
                <label for="pwd">City:</label>
                <input type="text" class="form-control" id="City" placeholder="City" value="{{ $company->city}}"
                       name="city">
            </div>

            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

@endsection

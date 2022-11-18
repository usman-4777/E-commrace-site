@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Add employee</h2>
        <form method="post" action="{{ route('employees.store') }}">
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" class="form-control" @error('name') is-invalid
                       @enderror id="name"
                       placeholder="Name" name="name">
                @error('name')
                <span class="invalid-feedback" role="alert" style="display: block">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

            </div>
            <div class="form-group">
                <label for="">Gender:</label>
                <input type="text" class="form-control" @error('gender') is-invalid
                       @enderror id="gender"
                       placeholder="Gender" name="gender">
                @error('gender')
                <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Skills:</label>
                <input type="text" class="form-control"
                       @error('skills') is-invalid
                       @enderror id="skills"
                       placeholder="Skills" name="skills">
                @error('skills')
                <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{$message}}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" class="form-control" @error('email') is-invalid
                       @enderror id="email"
                       placeholder="Email" name="email">
                @error('email')
                <span class="invalid-feedback" role="alert" style="display: block">
                <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for3>Select Company</label>
                <select name="company_id" class="form-control" id="company_id">
                    <option hidden selected>Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

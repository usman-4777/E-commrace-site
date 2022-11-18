@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2> Edit Form</h2>
        <form method="post" action="{{ route('employees.update', [$employee ->id]) }}">
            @csrf
            @if($employee)
                @method('put')
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="name" name="name"
                       value="{{ $employee->name }}">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <input type="text" class="form-control" id="gender" placeholder="gender" value="{{ $employee->gender}}"
                       name="gender">
            </div>

            <div class="form-group">
                <label for="skills">Skills:</label>
                <input type="text" class="form-control" id="skills" placeholder="Skills" value="{{ $employee->skills}}"
                       name="skills">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" placeholder="email" value="{{ $employee->email}}"
                       name="email">
            </div>


            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>

@endsection

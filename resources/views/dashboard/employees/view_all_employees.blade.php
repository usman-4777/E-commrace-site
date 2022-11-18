@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Employee List</h2>
        <a href="{{route('employees.create')}}">Add new employee</a>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Skills</th>
                <th scope="col">Email</th>
                <th scope="col">Company</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{$employee->skills}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->company->name}}</td>
                    <td>
                        <a href="{{route('employees.edit', [$employee->id])}}">Edit</a>
                        <a href="{{route('delete_employee', [$employee->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

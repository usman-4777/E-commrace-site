    @extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>Company List</h2>
        <a href="{{route('companies.create')}}">Add new company</a>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Ceo</th>
                <th scope="col">City</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{$company->name}}</td>
                    <td>{{$company->ceo}}</td>
                    <td>{{$company->city}}</td>
                    <td>
                        <a href="{{route('companies.edit', [$company->id])}}">Edit</a>
                        <a href="{{route('delete_company', [$company->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

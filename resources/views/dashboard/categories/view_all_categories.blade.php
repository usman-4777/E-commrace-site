@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2>VIEW ALL CAREGORIES List</h2>
        <a href="{{route('categories.create')}}">Add new category</a>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>

                    <td>
                        <a href="{{route('categories.edit', [$category->id])}}">Edit</a>
                        <a href="{{route('delete_category', [$category->id])}}">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

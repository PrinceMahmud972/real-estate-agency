@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="container mt-5">
        <h1>All Listed Properties</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-success my-2">Add New</a>

        @if ($properties->isEmpty())
        <p class="display-3">Sorry, no Properties are available at this moment</p>
        @else

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                <tr>
                    <th scope="row">{{ $property->id }}</th>
                    <td><img src="/img/{{ $property->image }}" alt="" class="img-fluid" style="max-width: 150px" ></td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->upazila->name }}, {{ $property->upazila->district->name }}, {{ $property->upazila->district->division->name }}</td>
                    <td>
                        <a href="{{ route('admin.property.edit', ['property' => $property->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.property.destroy', ['property' => $property->id]) }}" method="post" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

</div>

@endsection
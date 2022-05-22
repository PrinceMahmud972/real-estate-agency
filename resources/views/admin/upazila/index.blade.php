@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="container mt-5">
        <h1>All Listed Locations</h1>
        <a href="{{ route('admin.property.create') }}" class="btn btn-success my-2">Add New</a>

        @if ($upazilas->isEmpty())
        <p class="display-3">Sorry, no locations are available at this moment</p>
        @else

        <table id="locationTable" class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Upazila</th>
                    <th scope="col">District</th>
                    <th scope="col">Division</th>
                    <th scope="col">Available Properties</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($upazilas as $upazila)
                <tr>
                    <th scope="row">{{ $upazila->id }}</th>
                    <td>{{ $upazila->name }}</td>
                    <td>{{ $upazila->district->name }}</td>
                    <td>{{ $upazila->district->division->name }}</td>
                    <td>{{ $upazila->properties->count() ? $upazila->properties->count() : 'Null' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

</div>

@endsection
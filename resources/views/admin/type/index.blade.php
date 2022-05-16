@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="container mt-5">
        <h1>All Types</h1>
        <a href="{{ route('admin.type.create') }}" class="btn btn-success my-2">Add New</a>

        @if ($types->isEmpty())
        <p class="display-3">Sorry, no types are available at this moment</p>
        @else

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td><img src="/img/{{ $type->image }}" alt="" class="img-fluid"></td>
                    <td>{{ $type->name }}</td>
                    <td>
                        <a href="{{ route('admin.type.edit', ['type' => $type->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.type.destroy', ['type' => $type->id]) }}" method="post" class="d-inline-block">
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
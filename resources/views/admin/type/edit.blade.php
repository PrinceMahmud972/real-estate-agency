@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    <div class="container mt-5">
        <h1>Edit Type - {{ $type->name }}</h1>
        <div class="w-50 mx-auto mt-5 ">
            <form method="POST" action="{{ route('admin.type.update', ['type' => $type->id]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Type Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Type Name"
                    value="{{ old('name') ? old('name') : $type->name }}">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="image">Type Image</label><br>
                    <img src="/img/{{ $type->image }}" alt="{{ $type->name }}" class="img-fluid my-2"><br>
                    <input type="file" name="image" class="form-control-file" id="image">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>

    </div>

</div>

@endsection
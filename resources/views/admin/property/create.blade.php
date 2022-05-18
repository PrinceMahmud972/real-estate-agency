@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    <div class="container mt-5">
        <h1>Add New Property</h1>
        <div class="w-50 mx-auto mt-5 ">
            <form method="POST" action="{{ route('admin.type.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Property Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Property Name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="price">Property Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter Property Price">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="address">Property Address</label>

                    <div class="d-flex gap-2">
                        <div>
                            <label for="division" class="small">Select Division</label>
                            <select class="form-select" name="division" id="#division">
                                <option selected>Select a Division</option>
                                @foreach (App\Models\Division::all() as $division)
                                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="district" class="small">Select District</label>
                            <select class="form-select" name="district" id="#district" disabled>
                                <option selected>Select a District</option>
                            </select>
                        </div>

                        <div>
                            <label for="upazila" class="small">Select Upazila</label>
                            <select class="form-select" name="upazila" id="#upazila" disabled>
                                <option selected>Select an Upazila</option>
                            </select>
                        </div>

                    </div>
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="image">Type Image</label><br>
                    <input type="file" name="image" class="form-control-file" id="image">
                    @error('image')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="price">Property Size</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Enter Property Price">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

</div>

@endsection
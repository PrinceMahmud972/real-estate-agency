@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    <div class="container mt-5">
        <h1>Add New Upazila/City</h1>
        <div class="w-50 mx-auto mt-5 ">
            <form method="POST" action="{{ route('admin.upazila.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Upazila/City Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Upazila Name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="address">Upazila's Parent Location</label>

                    <div class="d-flex gap-2">
                        <div>
                            <label for="division" class="small">Select Division</label>
                            <select class="form-select" name="division" id="#division">
                                <option selected>Select a Division</option>
                                @foreach (App\Models\Division::all() as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                                @endforeach
                            </select>
                            @error('division')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="district" class="small">Select District</label>
                            <select class="form-select" name="district" id="#district" disabled>
                                <option selected>Select a District</option>
                            </select>
                        </div>

                    </div>
                    @error('district')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

</div>

@endsection
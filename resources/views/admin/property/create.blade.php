@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    <div class="container mt-5">
        <h1>Add New Property</h1>
        <div class="w-50 mx-auto mt-5 ">
            <form method="POST" action="{{ route('admin.property.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Property Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Property Name">
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2 d-flex flex-column flex-md-row gap-2">
                    <div style="min-width: 50%">
                        <label for="type">Property Type</label>
                        <select class="form-select" name="type">
                            <option selected disabled>Select a Type</option>
                            @foreach (App\Models\Type::all() as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div style="min-width: 50%">
                        <label for="purpose">Property Purpose</label>
                        <select class="form-select" name="purpose">
                            <option selected disabled>Select the purpose</option>
                            <option value="sell">Sell</option>
                            <option value="rent">Rent</option>

                        </select>
                        @error('purpose')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="size">Property Size</label>
                        <div class="input-group mb-2">
                            <div class="input-group-text"><i class="fas fa-ruler-combined"></i></div>
                            <input type="number" class="form-control" name="size" placeholder="Size(ft)">
                        </div>
                        @error('size')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bedroom">Bedroom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-text"><i class="fas fa-bed"></i></div>
                            <input type="number" class="form-control" name="bedroom" placeholder="Bedroom">
                        </div>
                        @error('bedroom')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="bathroom">Property bathroom</label>
                        <div class="input-group mb-2">
                            <div class="input-group-text"><i class="fas fa-bath"></i></div>
                            <input type="number" class="form-control" name="bathroom" placeholder="Bathroom">
                        </div>
                        @error('bathroom')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
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
                            @error('division')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>

                        <div>
                            <label for="district" class="small">Select District</label>
                            <select class="form-select" name="district" id="#district" disabled>
                                <option selected>Select a District</option>
                            </select>
                            @error('district')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>

                        <div>
                            <label for="upazila" class="small">Select Upazila</label>
                            <select class="form-select" name="upazila" id="#upazila" disabled>
                                <option selected>Select an Upazila</option>
                            </select>
                        </div>

                    </div>
                    @error('upazila')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="price">Property Price</label>
                    <input type="number" name="price" class="form-control" id="price"
                        placeholder="Enter Property Price">
                    @error('price')
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

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>

</div>

@endsection
<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <form action="{{ route('property.index') }}" method="GET" class="d-flex gap-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <select class="location-select form-select" name="location">
                                <option selected disabled>Location</option>
                                @foreach ($upazilas as $upazila)
                                    <option value="{{ $upazila->id }}">{{ $upazila->name }}, {{ $upazila->district->name }}, {{ $upazila->district->division->name }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="type">
                                <option selected disabled>Property Type</option>
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0" name="purpose">
                                <option selected disabled>Rent/Sell</option>
                                <option value="rent">Rent</option>
                                <option value="sell">Sell</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Search End -->
@extends('front.layouts.app')

@section('section')

<div class="container py-4">
    <div class="flex">
        <div class="row">
            <div class="col-md-8">
                <img src="/img/{{ $property->image }}" alt="" class="w-100">
            </div>
            <div class="col-md-4 d-flex flex-column justify-content-end">
                <h2 class="text-primary text-center">Makaan</h2>
                <form action="{{ route('booking.store', ['property' => $property->id]) }}" class="" method="post">
                    @csrf
                    <p class="text-center">Contact us for more information</p>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control form-control-sm" id="bookingName" placeholder="Enter Name" style="" value="{{ auth()->user()->name ?? '' }}">
                        <label for="bookingName">NAME*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="bookingEmail" placeholder="Enter Email" value="{{ auth()->user()->email ?? '' }}">
                        <label for="bookingName">EMAIL*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="bookingPhone" placeholder="Enter Name">
                        <label for="bookingName">PHONE*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="bookingMessage" id="bookingMessage" style="height: 100px; font-size: .875rem">I would like to inquire about your property Makaan - ID{{ $property->id }}. Please contact me at your earliest convenience.</textarea>
                        <label for="bookingMessage">MESSAGE*</label>
                    </div>
                    <div class="d-grid">
                        @if(auth()->check() && auth()->user()->bookings()->get()->contains('property_id', $property->id))
                            <button class="btn btn-primary btn-lg" disabled>Booked</button>
                        @else
                            <button class="btn btn-primary btn-lg">Book Now</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8">
            <p class="h3">BDT {{ $property->price }}</p>
            <p class="h5 mt-3">
                {{ $property->upazila->name }}, {{ $property->upazila->district->name }}
            </p>
            <div class="flex mt-3">
                <span class="me-2 d-inline-block">
                    <i class="fa fa-ruler-combined"></i>
                    {{ $property->size }} sqft
                </span>
                <span class="me-2 d-inline-block">
                    <i class="fa fa-bed"></i>
                    {{ $property->size }} sqft
                </span>
                <span class="me-2 d-inline-block">
                    <i class="fa fa-bath"></i>
                    {{ $property->size }} sqft
                </span>
            </div>
            <p class="title h5 mt-4">{{ $property->name }}</p>
            <p class="mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione tempora voluptatum porro aperiam odit obcaecati quibusdam voluptate nam fugiat qui atque officia dignissimos, sint blanditiis tenetur? Quaerat, deleniti. Ut, quo.</p>
            <h3>Property Information</h3>
            <ul class="list-unstyled text-dark" style="columns: 2">
                <li class="py-2 border-bottom d-flex">
                    <span class="w-50">Type:</span>
                    <span><strong>{{ $property->type->name }}</strong></span>
                </li>
                <li class="py-2 border-bottom d-flex">
                    <span class="w-50">Purpose:</span>
                    <span><strong>{{ $property->purpose }}</strong></span>
                </li>
                <li class="py-2 border-bottom d-flex">
                    <span class="w-50">ID:</span>
                    <span><strong>ID{{ $property->id }}</strong></span>
                </li>
                <li class="py-2 border-bottom d-flex">
                    <span class="w-50">Last Updated:</span>
                    <span><strong>{{ $property->updated_at->format('d M Y') }}</strong></span>
                </li>
            </ul>
        </div>
    </div>
</div>


@endsection
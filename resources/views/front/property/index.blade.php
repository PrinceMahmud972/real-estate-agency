@extends('front.layouts.app')

@section('section')

<div class="container py-4">

    @include('front.layouts.search')

    <div class="row">
        <div class="col d-flex justify-content-end">
            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary {{ request('purpose') == 'rent' ? 'active' : '' }}"
                    href="{{ route('property.index', ['purpose' => 'rent']) }}">For Rent</a>
                </li>
                <li class="nav-item me-0">
                    <a class="btn btn-outline-primary {{ request('purpose') == 'sell' ? 'active' : '' }}"
                    href="{{ route('property.index', ['purpose' => 'sell']) }}">For Sell</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row g-4">
        @foreach ($properties as $property)
        <div class="col-lg-4 col-md-6 wow fadeInUp">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('property.show', ['property' => $property->id]) }}"><img class="img-fluid" src="/img/{{ $property->image }}" alt=""></a>
                    <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">For {{ $property->purpose }}</div>
                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">{{ $property->type->name }}</div>
                </div>
                <div class="p-4 pb-0">
                    <h5 class="text-primary mb-3">${{ $property->price }}</h5>
                    <a class="d-block h5 mb-2" href="{{ route('property.show', ['property' => $property->id]) }}">{{ $property->name }}</a>
                    <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $property->upazila->name }}</p>
                </div>
                <div class="d-flex border-top">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>{{ $property->size }} Sqft</small>
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>{{ $property->bedroom }} Bed</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>{{ $property->bathroom }} Bath</small>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 d-flex text-center wow fadeInUp justify-content-center" data-wow-delay="0.1s">
            {{ $properties->links() }}
        </div>
    </div>
</div>


@endsection
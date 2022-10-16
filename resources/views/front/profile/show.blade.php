@extends('front.layouts.app')

@section('section')

<div class="container emp-profile">
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                    @if(auth()->check() && auth()->user()->id === $user->id)
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                            <h5>
                                {{ $user->name }}
                            </h5>
                            <h6>
                                {{ $user->email }}
                            </h6>
                            <p class="proile-rating">Member Scince : <span>{{ date("F j, Y",strtotime($user->created_at)) }}</span></p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="booking-tab" data-bs-toggle="tab" data-bs-target="#booking" role="tab" aria-controls="booking" aria-selected="false">Bookings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                @if (auth()->check() && auth()->user()->id === $user->id)
                    <a href="{{ route('users.edit', ['user'=>$user->id]) }}" class="profile-edit-btn">Edit Profile</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                {{-- <div class="profile-work">
                    <p>WORK LINK</p>
                    <a href="">Website Link</a><br/>
                    <a href="">Bootsnipp Profile</a><br/>
                    <a href="">Bootply Profile</a>
                    <p>SKILLS</p>
                    <a href="">Web Designer</a><br/>
                    <a href="">Web Developer</a><br/>
                    <a href="">WordPress</a><br/>
                    <a href="">WooCommerce</a><br/>
                    <a href="">PHP, .Net</a><br/>
                </div> --}}
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>123 456 7890</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Total Bookings</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $user->bookings->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking-tab">
                        @if($user->bookings->count() < 1)
                            <p>No Bookings Available</p>
                        @else
                            @foreach ($user->bookings as $booking)
                            <div class="row">
                                <div class="col-md-6">
                                    <label>{{ $booking->property->name }}</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ $booking->status }}</p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>           
</div>


@endsection
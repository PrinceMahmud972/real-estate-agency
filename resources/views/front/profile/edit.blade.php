@extends('front.layouts.app')

@section('section')

<div class="container emp-profile">
    <div class="row">
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
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="tab-content profile-tab" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form method="POST" action="{{ route('users.update', ['user' => $user->id]) }}">
                        @method("put")
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>Email</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label>password</label>
                            </div>
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
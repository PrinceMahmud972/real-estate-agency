@extends('front.layouts.app')

@section('section')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 mx-auto p-5 mt-4 border border-primary rounded">
            <h1 class="text-center pb-4">Login</h1>
            <form action="{{ route('postRegister') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" name="name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="password" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="passwordVerify" placeholder="Verify Password" name="password_confirmation">
                            <label for="passwordVerify">Confirm Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Register</button>
                    </div>
                </div>
            </form>
            <p class="text-center mt-4">
                If you already have an account,
                <a class="text-primary" href="{{ route('login') }}">login</a>.
            </p>
        </div>
    </div>
</div>
@endsection
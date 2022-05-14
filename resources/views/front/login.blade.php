@extends('front.layouts.app')

@section('section')
<div class="container">
    @if (Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-6 mx-auto p-5 mt-4 border border-primary rounded">
            <h1 class="text-center pb-4">Login</h1>
            <form action="{{ route('postLogin') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="name" placeholder="Your Email" name="email">
                            <label for="name">Your Email</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="password" name="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                    </div>
                </div>
            </form>
            <p class="text-center mt-4">
                If you don't have an account,
                <a class="text-primary" href="{{ route('register') }}">register</a>.
            </p>
        </div>
    </div>
</div>
@endsection
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/css/bootstrap.min.css"
        integrity="sha512-o/MhoRPVLExxZjCFVBsm17Pkztkzmh7Dp8k7/3JrtNCHh0AQ489kwpfA3dPSHzKDe8YCuEhxXq3Y71eb/o6amg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto pt-5">

        <div class="container">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <form method="POST" action="{{ route('admin.postLogin') }}">
                        @csrf
                        <h1>Real Estate</h1>
                        <h2 class="h3 mb-3 fw-normal">Please sign in</h2>
                        <div class="form-floating mb-4">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                    </form>
                    @if(session()->has('error'))
                        <p class="text-danger">{{ session('error') }}</p>
                    @endif
                </div>
            </div>
        </div>


    </main>



</body>

</html>
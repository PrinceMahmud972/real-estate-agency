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
    <style>
        .btn-toggle {
            padding: .25rem .5rem;
            font-weight: 600;
            color: rgba(0, 0, 0, .65);
            background-color: transparent;
        }

        .btn-toggle:hover,
        .btn-toggle:focus {
            color: rgba(0, 0, 0, .85);
            background-color: #d2f4ea;
        }
    </style>

    <title>Admin Dashboard</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                        <svg class="bi pe-none me-2" width="30" height="24">
                            <use xlink:href="#bootstrap" />
                        </svg>
                        <span class="fs-5 fw-semibold">Rea Estate</span>
                    </a>
                    <ul class="list-unstyled ps-0">
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                                <i class="fa-solid fa-house-user"></i>&nbsp;Home
                            </button>
                            <div class="collapse show px-4" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Updates</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Reports</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                                <i class="fa-solid fa-building-circle-check"></i></i>&nbsp;Properties
                            </button>
                            <div class="collapse" id="dashboard-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Overview</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Weekly</a></li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Monthly</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Annually</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                                Orders
                            </button>
                            <div class="collapse" id="orders-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Processed</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Shipped</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Returned</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="border-top my-3"></li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                                data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>&nbsp;Account
                            </button>
                            <div class="collapse" id="account-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">{{ auth()->guard('admin')->user()->name }}</a>
                                    </li>
                                    <li><a href="#"
                                            class="link-dark d-inline-flex text-decoration-none rounded">Settings</a>
                                    </li>
                                    <li><a href="{{ route('admin.logout') }}" class="link-dark d-inline-flex text-decoration-none rounded">Sign
                                            out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <h1>hello World</h1>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0-beta1/js/bootstrap.min.js"
        integrity="sha512-Hqe3s+yLpqaBbXM6VA0cnj/T56ii5YjNrMT9v+us11Q81L0wzUG0jEMNECtugqNu2Uq5MSttCg0p4KK0kCPVaQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
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
                        <li><a href="{{ route('admin.booking.index') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded">Bookings</a>
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
                <div class="collapse px-4" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.property.index') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i></i>&nbsp;
                                All Property</a>
                        </li>
                        <li><a href="{{ route('admin.property.create') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i>&nbsp;
                                Add New</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#types-collapse" aria-expanded="false">
                    <i class="fa-solid fa-table-list"></i>&nbsp; Type
                </button>
                <div class="collapse px-4" id="types-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.type.index') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i></i>&nbsp;
                                All Type</a>
                        </li>
                        <li><a href="{{ route('admin.type.create') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i>&nbsp;
                                Add New</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#location-collapse" aria-expanded="false">
                    <i class="fa-solid fa-location-dot"></i>&nbsp; Location
                </button>
                <div class="collapse px-4" id="location-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('admin.upazila.index') }}"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i></i>&nbsp;
                                All Location</a>
                        </li>
                        <li><a href="admin.upazila.create"
                                class="link-dark d-inline-flex text-decoration-none rounded align-items-center">
                                <i class="fa-solid fa-circle-dot"></i>&nbsp;
                                Add New</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>&nbsp;Account
                </button>
                <div class="collapse px-4" id="account-collapse">
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
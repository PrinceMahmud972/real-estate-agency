@extends('admin.layouts.app')

@section('section')

<div class="col-md-9">
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    <div class="container mt-5">
        <h1>All Bookings</h1>

        @if ($bookings->isEmpty())
        <p class="display-3">Sorry, no bookings are available at this moment</p>
        @else

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">User Contact</th>
                    <th scope="col">Property</th>
                    <th scope="col">Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <th scope="row">{{ $booking->id }}</th>
                    <td>{{ $booking->user->email }}</td>
                    <td>{{ $booking->property->name }}</td>
                    <td>{{ $booking->message }}</td>
                    <td> <span class="btn btn-sm btn-info">{{ $booking->status }}</span></td>
                    <td>
                        <form action="{{ route('admin.booking.statusAccept', ['booking' => $booking->id]) }}" method="post" class="d-inline-block">
                            @method('put')
                            @csrf
                            <button class="btn btn-sm btn-success">Accept</button>
                        </form>
                        <form action="{{ route('admin.booking.statusReject', ['booking' => $booking->id]) }}" method="post" class="d-inline-block">
                            @method('put')
                            @csrf
                            <button class="btn btn-sm btn-warning">Reject</button>
                        </form>
                        <form action="{{ route('admin.booking.destroy', ['booking' => $booking->id]) }}" method="post" class="d-inline-block">
                            @method('delete')
                            @csrf
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif
    </div>

</div>

@endsection
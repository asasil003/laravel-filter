@extends('welcome')
@section('content')
<div class="container mt-5">
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-10">
            <input type="text" name="search" value="{{ $search }}" placeholder="Search by name"
                class="form-control" />
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">
                Search
            </button>
        </div>
    </form>
    @if($error)
        <div class="alert alert-danger mb-4">{{ $error }}</div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user['name'] ?? $user->name }}</td>
                        <td>{{ $user['email'] ?? $user->email }}</td>
                        <td>
                            @php
                                $address = $user['address'] ?? ($user->address ? json_decode($user->address, true) : []);
                            @endphp
                            {{ $address['street'] ?? '' }} {{ $address['suite'] ?? '' }}, {{ $address['city'] ?? '' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Staff Members</h1>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Add New Staff</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($staff as $index => $member)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>
                        <!-- Add actions like edit or delete here if required -->
                        <a href="#" class="btn btn-sm btn-secondary">Edit</a>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No staff members found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

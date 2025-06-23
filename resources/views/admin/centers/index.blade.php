@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Centers Management</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Create Center Form -->
    <div class="card mb-4">
        <div class="card-header">Add New Center</div>
        <div class="card-body">
            <form action="{{ route('admin.centers.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Center Name</label>
                    <input type="text" name="name" class="form-control" required placeholder="Enter center name">
                </div>
                <div class="form-group">
                    <label for="location">Location (Optional)</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter location">
                </div>
                <button type="submit" class="btn btn-success mt-2">Add</button>
            </form>
        </div>
    </div>

    <!-- Centers Table -->
    <div class="card">
        <div class="card-header">Centers List</div>
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($centers as $center)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $center->name }}</td>
                            <td>{{ $center->location ?? '-' }}</td>
                            <td>{{ $center->created_at->format('Y-m-d') }}</td>
                            <td>
                                <!-- Edit Button -->
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal{{ $center->id }}">
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.centers.destroy', $center->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this center?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $center->id }}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <form action="{{ route('admin.centers.update', $center->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Center</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{ $center->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" name="location" class="form-control" value="{{ $center->location }}">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@extends('backend.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('admin.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}"
                    required>
            </div>
            <button type="submit" class="btn btn-dark btn-lg">Update User</button>
        </form>
    </div>
@endsection

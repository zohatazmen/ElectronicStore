@extends('backend.layouts.app')

@section('title', 'Add New User')

@section('content')
    <div class="container">
        <h2>{{ isset($admin) ? 'Edit User' : 'Add New User' }}</h2>
        <br>
        <form action="{{ $url }}" method="POST">
            @csrf
            @if (isset($admin))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $admin->name ?? '' }}"
                    required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $admin->phone ?? '' }}"
                    required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $admin->email ?? '' }}"
                    required>
            </div>
            @if (!isset($admin))
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                        required>
                </div>
            @endif
            <br>
            <button type="submit" class="btn btn-dark btn-lg">{{ isset($admin) ? 'Update' : 'Add User' }}</button>
        </form>
    </div>
@endsection

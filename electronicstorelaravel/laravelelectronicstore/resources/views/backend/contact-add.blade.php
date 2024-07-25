@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Contact</h1>

        <form action="{{ route('admin.contacts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Contact</button>
        </form>
    </div>
@endsection

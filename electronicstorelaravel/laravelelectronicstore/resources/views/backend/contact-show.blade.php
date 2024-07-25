@extends('backend.layouts.app')

@section('content')
<div class="container">
    <h1>Contact Details</h1>

    <div class="card">
        <div class="card-header">
            Contact ID: {{ $contact->id }}
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
            <p><strong>Message:</strong> {{ $contact->message }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary">Back to Contacts</a>
            <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection

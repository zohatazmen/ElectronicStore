@extends('backend.layouts.app')

@section('title', 'Add New Shop Product')

@section('content')
    <div class="page-content">
        <div class="container">
            <h1>Add New Shop Product</h1>
<br>
            <!-- Create Form -->
            <form action="{{ route('admin.shops.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" required>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
<br>
                <button type="submit" class="btn btn-dark btn-lg">Add Shop</button>
            </form>


        </div>
    </div>
@endsection

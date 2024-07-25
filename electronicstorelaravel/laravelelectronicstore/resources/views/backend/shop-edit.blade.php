@extends('backend.layouts.app')

@section('title', 'Edit Shop Product')

@section('content')
    <div class="page-content">
        <div class="container">
            <h1>Edit Shop Product</h1>
<br>
            <!-- Edit Form -->
            <form action="{{ route('admin.shops.update', $shop->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $shop->name) }}" required>
                </div>
            
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">{{ old('description', $shop->description) }}</textarea>
                </div>
            
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $shop->category) }}" required>
                </div>
            
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $shop->price) }}" required>
                </div>
            
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @if($shop->image)
                        <img src="{{ asset('storage/' . $shop->image) }}" alt="Current Image" width="100">
                    @endif
                </div>
            <br>
                <button type="submit" class="btn btn-dark btn-lg">Update Shop</button>
            </form>
            

        </div>
    </div>
@endsection

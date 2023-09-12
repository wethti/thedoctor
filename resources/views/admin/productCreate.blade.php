@extends('layouts.main')
@section('content')

    <style>
        form > *{
            display: block;
        }

        form > label {
            margin-top: 1rem;
        }
    </style>

        @if(session('success'))
        <div class="msg msg-success">
            <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
            <p> Product added successfully</p>
        </div>
        @elseif(session('error'))
        <div class="msg msg-error">
            <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
            <p> Error adding the product</p>
        </div>
        @endif


    <h1>Add new product</h1>
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="title">Product Name:</label>
        <input type="text" name="title" id="title" required>

        <label for="description">Product Description:</label>
        <textarea name="description" id="description" rows="4" required></textarea>

        <label for="properties">Product Properties:</label>
        <textarea name="properties" id="properties" rows="4" required></textarea>

        <label for="priceUSD">Price (USD):</label>
        <input type="number" name="priceUSD" id="priceUSD" required>

        <label for="images">Product Images:</label>
        <input type="file" name="images[]" id="images" accept="image/*" multiple required>

        <button type="submit">Add Product</button>
    </form>
    
@endsection
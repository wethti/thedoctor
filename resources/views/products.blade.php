@extends('layouts.main')
@section('content')
<h1> Catalog </h1>
<div class="product-grid">
    @foreach ($products as $product)
    <div class="product-square">
        <a href="{{ route('product.show', ['id' => $product->id]) }}">
            <div class="image-container">
                <img class="cover-img" src="{{asset($product->images ? 'product_images/'.$product->images->first()->image : '')}}">
            </div>
        <h3><strong> {{$product->title}} </strong></h3>
        <p class="description">{{$product->description}}</p>
        </a>
    </div>
    @endforeach
</div>

@endsection
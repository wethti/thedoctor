@extends('layouts.main')
@section('content')
<style>
    /* .content-wrapper {
            padding: 0 0 4rem;
        } */
</style>
    <div class="product-banner">
        <div class="image-container">
            <img class="cover-img" src="{{asset($product->images ? 'product_images/'.$product->images->first()->image : '')}}">
        </div>
    </div>
    <div class="product-data">

    <!-- BREADCRUMBS -->
        <ol class="breadcrumbs" itemscope="" itemtype="https://schema.org/BreadcrumbList">
            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemprop="item" href="/">
                    <span itemprop="name">
                        <i class="fa fa-home" aria-hidden="true" aria-label="Home" title="Home"></i>
                        <span class="sr-only">Home</span>
                    </span>
                </a>
                <meta content="1" itemprop="position">
            </li>
            <li class="separator">&gt;</li>
            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <a itemprop="item" href=" {{ route('product.index'); }} ">
                    <span itemprop="name">
                        Каталог
                    </span>
                </a>
                <meta content="2" itemprop="position">
            </li>
            <li class="separator">&gt;</li>
            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem">
                <span itemprop="name">
                    {{ $product->title }}
                </span>
                <meta content="3" itemprop="position">
            </li>
        </ol>
        <h1>{{$product->title}}</h1>
        <p class="description">{{$product->description}}</p>
        <h4> Properties </h4>
        <p class="description"> {{$product->properties}}</p>
    </div>

@endsection
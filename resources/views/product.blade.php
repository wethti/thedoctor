@extends('layouts.main')
@section('content')
<script type="text/javascript" src="{{ asset('js/productCarousel.js') }}" defer></script>
<style>
    .content-wrapper {
            padding: 0;
        }
</style>
<div class="product-wrapper">
    <div class="product-banner">
        <div class="carousel" data-carousel>
            <button class="carousel-button prev" data-carousel-button="prev">&#10094;</button>
            <button class="carousel-button next" data-carousel-button="next">&#10095;</button>
            <ul data-slides> @php

            $carouselDir = 'product_images/';
            
            $imageFiles = [];            
            if ($product->images) {
                foreach ($product->images as $image) {
                    $imageFiles[] = $carouselDir . $image->image;
                }
            }
            
            
            @endphp
                @foreach ($imageFiles as $index => $imageFile)
                <li class="product-slide" {{ $index === 0 ? 'data-active' : '' }} data-tab-number="{{ $index }}">
                    <img src="{{ asset($carouselDir . basename($imageFile)) }}" alt="TheDoctor banner #{{ $index + 1 }}">
                </li>
                @endforeach
            </ul>
            <ol class="product-selectors">
                @foreach ($imageFiles as $index => $imageFile)
                <li class="product-selector{{ $index === 0 ? ' selected' : '' }}" data-tab="{{ $index }}" role="button" tabindex="0" title="Go to slide #{{ $index + 1 }}">
                    <img class="selector-img" src="{{asset($product->images ? 'product_images/'.$product->images->get($index)->image : '')}}">
                </li>
                @endforeach
            </ol>
        </div>
        <!-- <div class="image-container">
            <img class="cover-img" src="{{asset($product->images ? 'product_images/'.$product->images->first()->image : '')}}">
        </div> -->
    </div>



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

    <div class="product-data">



        
        <h1>{{$product->title}}</h1>
        <p class="description">{{$product->description}}</p>
        

        @php
        $accordions = [
            ['title' => 'Properties', 'dataColumn' => 'properties'],
            ['title' => 'Active ingredients', 'dataColumn' => 'properties'],
            ['title' => 'Usage', 'dataColumn' => 'properties'],
            ['title' => 'Composition', 'dataColumn' => 'properties'],
            ['title' => 'INCI', 'dataColumn' => 'properties'],
        ];
        @endphp

        @foreach ($accordions as $accordion)
        <div class="accordion description" data-dropdown>
            <a href="{{ 'javascript:void(0);' }}" class="link description-title">{{ $accordion['title'] }}</a>
            <div class="accordion-wrapper">
                <div class="accordion-menu-area">
                    <div class="accordion-select-menu">
                        <div>
                            <p class="description"> {{ $product[$accordion['dataColumn']] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-line"></div>
        </div>
        @endforeach
    </div>
</div>
    <h1>Reviews</h1>
@endsection
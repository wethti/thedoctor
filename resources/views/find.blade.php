@extends('layouts.main')
@section('content')
<style>
    .content-wrapper {
        padding: 0 0 4rem;
    }

</style>
    <div class="heading-banner" style="background-image: url({{ asset('img/TheDoctor/3.JPG') }});">
        <div class="banner-overlay"></div>
        <h1>How to find us?</h1>
    </div>

       

    <div class="content">
        <!-- BREADCRUMBS -->
       <ol class="breadcrumbs" style="width: 100%" itemscope="" itemtype="https://schema.org/BreadcrumbList">
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
                <span itemprop="name">
                    How to find us?
                </span>
                <meta content="3" itemprop="position">
            </li>
        </ol>
        <div class="contact-form-page">
            <p>Welcome to The Doctor Health & Care, your ultimate destination for complete care with powerful active ingredients and dermatologically tested formulas, all at affordable prices. Our products are meticulously crafted by pharmacists to prevent problems and enhance the condition of your skin and hair, giving you the confidence to embrace your natural beauty.</p>
            <div class="landing-line"></div>
        </div>
    </div>
@endsection
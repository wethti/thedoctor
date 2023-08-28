@extends('layouts.main')
@section('content')
<style>
    .content-wrapper {
        padding: 0 0 4rem;
    }

</style>
    <div class="heading-banner" style="background-image: url({{ asset('img/TheDoctor/2.JPG') }});">
        <div class="banner-overlay"></div>
        <h1>Contacts</h1>
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
                    Contacts
                </span>
                <meta content="3" itemprop="position">
            </li>
        </ol>
    <div class="contact-form-page">
        <p>Welcome to The Doctor Health & Care, your ultimate destination for complete care with powerful active ingredients and dermatologically tested formulas, all at affordable prices. Our products are meticulously crafted by pharmacists to prevent problems and enhance the condition of your skin and hair, giving you the confidence to embrace your natural beauty.</p>
        <div class="landing-line"></div>
        <ul>
      <li> <i class="fa-solid fa-phone"></i> +380 44 4514740 </li>
      <li> <i class="fa-solid fa-envelope"></i> info@thedoctor.eu </li>
        </ul>
        <div class="landing-line"></div>
    </div>


        <div class="contact-form-container">
            <h2>Contact Us</h2>
            @if(session('success'))
            <div class="msg msg-success">                    
                <button class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                <p>{{ session('success') }} </p>
            </div>
            @endif
            <form method="post" action="{{ route('contact.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
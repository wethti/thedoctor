@extends('layouts.main')
@section('content')

    <h1>Sitemap</h1>
    
    <h2> Pages </h2>
        <ul class="link-list">
            <li><a href="/about"> About us </a></li>
            <li><a href="/find"> Where to find us</a></li>
            <li><a href="/partner"> Become a partner </a></li>
            <li><a href="/contacts"> Contacts </a></li>
        </ul>

    <h2> Admin panel </h2>
        <ul class="link-list">
            <li><a href=" {{ route('admin.index') }} "> Navbar edit panel </a></li>
            <li><a href=" {{ route('admin.pages') }} "> Pages </a></li>
            <li><a href=" {{ route('sitemap') }} "> Sitemap </a> - this page</li>
            <li> _</li>
            <li><a href=" {{ route('admin.product.index') }} "> Catalog admin </a></li>
            <li><a href=" {{ route('admin.product.add') }} "> Add product </a></li>
        </ul>
@endsection
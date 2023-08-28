@extends('layouts.main')
@section('content')

<style>

.logo {
        display: inline-block;
        background: red;
        border-radius: 2rem;
    }

</style>


<!-- {{ phpinfo() }} -->
<a href="#" class="logo">
        <img src=" {{ asset('img/logo.png') }} " alt="TheDoctor logo">
    </a>


@endsection
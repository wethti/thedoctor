@extends('layouts.main')
@section('content')
<h1> Ingredients </h1>


    @php
        $currentLetter = null;
    @endphp
    @foreach ($accordions as $accordion)
        @php
            $firstLetter = substr($accordion['title'], 0, 1);
        @endphp

        @if ($firstLetter !== $currentLetter)
            @php
                $currentLetter = $firstLetter;
            @endphp

            <h2>{{ $currentLetter }}</h2>
        @endif


        <div class="accordion description" data-dropdown>
            <a href="{{ 'javascript:void(0);' }}" class="link description-title">{{ $accordion['title'] }}</a>
            <div class="accordion-wrapper">
                <div class="accordion-menu-area">
                    <div class="accordion-select-menu">
                        <div class="contact-list-wrapper">
                            <ul>
                                <p> {{ $accordion['description'] }}</p>

                                <strong> Uses </strong>
                                <p> {{ $accordion['uses'] }}</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-line"></div>
        </div>
    @endforeach

@endsection
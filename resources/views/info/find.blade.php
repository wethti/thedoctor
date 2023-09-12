@extends('layouts.main')
@section('content')
<h1> How to find us? </h1>

        @php
        $accordions = [
            ['title' => 'Ukraine', 'dataColumn' => 'properties'],
            ['title' => 'Poland', 'dataColumn' => 'properties'],
            ['title' => 'Slovakia', 'dataColumn' => 'properties'],
            ['title' => 'Germany', 'dataColumn' => 'properties'],
            ['title' => 'Uganda', 'dataColumn' => 'properties'],
        ];
        @endphp

        @foreach ($accordions as $accordion)
        <div class="accordion description" data-dropdown>
            <a href="{{ 'javascript:void(0);' }}" class="link description-title">{{ $accordion['title'] }}</a>
            <div class="accordion-wrapper">
                <div class="accordion-menu-area">
                    <div class="accordion-select-menu">
                        <div class="contact-list-wrapper">
                            <ul>
                                <li> <i class="fa-solid fa-phone"></i> +380 44 4514740 </li>
                                <li> <i class="fa-solid fa-envelope"></i> info@thedoctor.eu </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-line"></div>
        </div>
        @endforeach

@endsection
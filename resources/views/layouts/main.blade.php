<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | TheDoctor</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}" defer></script>
    <link rel="icon" href="{{ url('css/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet"/>
    <script>$.fn.poshytip={defaults:null}</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

    <!-- autoreload <script type="text/javascript" src="https://livejs.com/live.js"></script>-->

    <!-- scrollbar customizer -->
<link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.css"/>
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.min.js"></script>

</head>
<body>
<div class="wrapper">
<header class="navbar-header">
  <!-- <div class="navbar-header-style"> -->
    <nav class="navbar">
    <a href="/" class="logo">
        <img src=" {{ asset('img/logo.png') }} " alt="TheDoctor logo">
    </a>
        @foreach ($menutabs as $menutab)
        @if ($menutab->sections->count() > 0)
        @if ($menutab->sections->count() > 5)
        <div class="dropdown" data-dropdown>
          <a href="{{ $menutab->page ? route($menutab->page->route) : 'javascript:void(0);' }}" class="link" data-dropdown-button> {{$menutab->title}} </a>
          <div class="dropdown-wrapper">
            <div class="dropdown-menu-area">
              <div class="dropdown-select-menu information-grid">
              @else
        <div class="accordion" data-dropdown>
          <a href="{{ $menutab->page ? route($menutab->page->route) : 'javascript:void(0);' }}" class="link" data-dropdown-button> {{$menutab->title}} </a>
          <div class="accordion-wrapper">
            <div class="accordion-menu-area">
              <div class="accordion-select-menu">
        @endif
                <div>
                  @foreach ($menutab->sections->sortBy('position') as $section)
                    <div class="dropdown-heading"> <a href="{{ $section->page ? route($section->page->route) : 'javascript:void(0);' }}">{{ $section->title }}</a></div>
                    @if ($section->subsections->count() > 0)
                    <div class="dropdown-links">
                      @foreach ($section->subsections->sortBy('position') as $subsection)
                        <a href="{{ $subsection->page ? route($subsection->page->route) : 'javascript:void(0);' }}" class="link"> {{ $subsection->title }}</a>
                      @endforeach
                    </div>
                    @endif
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        @else
        <a href="{{ $menutab->page ? route($menutab->page->route) : 'javascript:void(0);' }}"> {{$menutab->title}} </a>
        @endif
        @endforeach
    </nav>
    <button class="menu-btn" aria-controls="primary-navigation" aria-expanded="false">
        <svg class="hamburger" viewBox="0 0 100 100" width="35">
            <rect class="line top" 
            width="80" height="10"
            x="10" y="25" rx="5">
            </rect>
            <rect class="line middle" 
            width="80" height="10"
            x="10" y="45" rx="5">
            </rect>
            <rect class="line bottom" 
            width="80" height="10"
            x="10" y="65" rx="5">
            </rect>
        </svg>
    </button>
    <span></span>
  </header>
  <div class="content-wrapper">
    @yield('content')
  </div>
</div>


<footer class="footer">
<div class="footer-logo">
  <img src=" {{ asset('img/logo.png') }} " alt="TheDoctor logo"></img>
</div>
  <div class="footer-wrapper">
    <div class="footer-column">
      <h2 class="footer-heading">About us</h2>
      <!-- Test if -->
      @if ($menutabs->where('title', 'About us')->first() && $menutabs->where('title', 'About us')->first()->sections)
      @foreach ($menutabs->where('title', 'About us')->first()->sections->sortBy('position') as $section)
        <a class="footer-links">{{ $section->title }}</a>
      @endforeach
      @endif
    </div>
    <div class="footer-column">
      <h2 class="footer-heading">Catalog</h2>
      <!-- Test if -->
      @if ($menutabs->where('title', 'Catalog')->first() && $menutabs->where('title', 'Catalog')->first()->sections)
      @foreach ($menutabs->where('title', 'Catalog')->first()->sections->sortBy('position') as $section)
        <a class="footer-links">{{ $section->title }}</a>
      @endforeach
      @endif
    </div>
    <div class="footer-column">
      <h2 class="footer-heading">Contacts</h2>
        <ul>
      <li> <i class="fa-solid fa-phone"></i> +380 44 4514740 </li>
      <li> <i class="fa-solid fa-envelope"></i> info@elfa.ua </li>
        </ul>
    </div>
  </div>
  <div class="footer-bottom">
    © 2022 - 2023 The Doctor Health & care
  </div>
</footer>


<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>

@yield('scripts')
</body>
</html>
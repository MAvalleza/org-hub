<link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">

@include('inc.navbar')
<div class="container-fluid">
    <div class="row">
        @guest
          <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-3">
            @yield('content')
          </main>
        @else
          @include('inc.sidebar')
          <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-3">
            @include('inc.messages')
            @yield('content')
          </main>
        @endguest
    </div>
</div>
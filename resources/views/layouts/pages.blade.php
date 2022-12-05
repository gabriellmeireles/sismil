<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

       {{--  <title>{{ config('app.name', 'SISMIL') }}</title> --}}
        <title>@yield('page-title')</title>
        
        <!-- CSS files -->
        <link href="{{ asset('dist/css/tabler.css') }}" rel="stylesheet" />
        <link href="{{ asset('dist/libs/ijabo/ijabo.min.css')}}" rel="stylesheet" />
        @stack('stylesheets')
        @livewireStyles
    </head>
    <body>
        <div class="wrapper">
            @include('layouts.navbar')
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="container-xl">
                        @yield('content')
                    </div>
                </div>
                @include('layouts.footer')
            </div>
        </div>
      
        <!-- Libs JS -->
        <script src="{{ asset('dist/libs/jquery/jquery-3.6.1.min.js') }}"></script>
        <script src="{{ asset('dist/libs/ijabo/ijabo.min.js') }}"></script>
        <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

        <!-- Tabler Core -->
        <script src="{{ asset('dist/js/tabler.js') }}"></script>
        @stack('scripts')
        @livewireScripts
        <script>
          window.addEventListener('showEventMessage', function(event){
              toastr.remove();
              if(event.detail.type === 'info'){
                toastr.info(event.detail.message);
              }else if(event.detail.type === 'success'){
                toastr.success(event.detail.message);
              }else if(event.detail.type === 'error'){
                toastr.error(event.detail.message);
              }else if(event.detail.type === 'warning'){
                toastr.warning(event.detail.message);
              }else{
                return false;
              }
            });
        </script>
      </body>
      
</html>
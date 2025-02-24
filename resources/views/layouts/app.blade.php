@if(auth()->check())
 @include('create.blade')
    @include('partials.sidebar')
    <div class="content-wrapper">
        @yield('content')
    </div>
@else
    <script>window.location = "{{ route('login') }}";</script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    
@endif

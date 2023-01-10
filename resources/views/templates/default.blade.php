@include('templates.partial.header')
    <body>
        <script src="{{asset('mazer')}}/assets/js/initTheme.js"></script>
        <div id="app">

            @include('templates.partial.sidebar')

            <div id="main">

                @yield('content')
                @include('templates.partial.footer')

            </div>
        </div>

        @yield('script')

    </body>
</html>

@include('templates.partial.header')
    <body>
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

<!DOCTYPE html>
<html lang="en">
@include('templates.partials.head')

<body>
    @include('templates.partials.navbar')

    {{-- CONTENT --}}
    @yield('content')
    {{-- CONTENT --}}

    <footer class="footer fixed-bottom" style="background-color: #f5f5f5;">
        <div class="container">
            <div class="mx-auto py-2">
                © 2020 Copyright:
                <a href="https://github.com/tommyrachmadiono" target="_blank"> Tommy Rachmadiono</a>
            </div>
        </div>
    </footer>
</body>

</html>
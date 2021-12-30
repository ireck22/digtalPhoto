<!doctype html>
<html>

<head>
    <!-- <meta charset="UTF-8">
    <title>sss</title> -->
    @include('includes.heade')
</head>

<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>
        <div id="app">
        
            <div id="main" class="row">

                @yield('content')

            </div>
        </div>
        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
</body>

</html>
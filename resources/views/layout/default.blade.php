<!doctype html>
<html>

<head>
    <!-- <meta charset="UTF-8">
    <title>sss</title> -->
    @include('includes.heade')
</head>

<!-- <body class="bk-set"> -->
<body>
    <div class="all_div">

        <header class="row">
            @include('includes.header')
        </header>
        <div id="app"> 
            <!-- bg-success p-2 text-white bg-opacity-75 -->
            <div id="main" class="row">

                @yield('content')

            </div>
        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
    
     <!-- 加載js -->
     <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
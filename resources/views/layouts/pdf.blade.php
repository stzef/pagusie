<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    @yield('title')

    <style>
        .cuadrado {
            width: 45px;
            height: 20px;
            border: 1px solid #555;
        }
        @page { margin: 130px 50px; }
        #header { position: fixed; left: 0px; top: -130px; right: 0px; height: 10;  text-align: center; }
        #footer { position: fixed; left: 0px; bottom: -130px; right: 0px; height: 70px;  }
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
    <link rel="stylesheet" href="layout/css/bootstrap-without-icons.min.css" >


    @yield('styles')

</head>
<body id="app-layout">

    <header id="header">
        @yield('header')
    </header>
    <footer id="footer">
        @yield('footer')
    </footer>

    @yield('body')

    @yield('scripts')
</body>
</html>

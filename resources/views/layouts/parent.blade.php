<DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>@yield('title')｜nodoame.net</title>
<meta name="description" itemprop="description" content="@yield('description')">
<meta name="keywords" itemprop="keywords" content="@yield('keywords')">
<!-- <link href="/css/star/layout.css" rel="stylesheet"> -->
<!-- @yield('pageCss') -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">

</head>
<body class="container">
 
@yield('header')
 
<div class="contents">
    <!-- コンテンツ -->
    <div class="main">
        @yield('content')
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

</body>
</html>
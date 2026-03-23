<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>

    <!-- Link your CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- ✅ PASTE STEP 4 HERE -->
    <nav>
        <h1>My Laravel App</h1>
        <div>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/blog">Blog</a>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <footer>
        <p>© 2026 My Laravel App</p>
    </footer>
    <!-- ✅ END -->

</body>
</html>
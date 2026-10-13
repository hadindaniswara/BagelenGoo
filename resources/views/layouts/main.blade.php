<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BagelenGoo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="/">BagelenGoo</a>
            <div class="navbar-nav">
                <a class="nav-link text-dark" href="/">Home</a>
                <a class="nav-link text-dark" href="/about">About</a>
                <a class="nav-link text-dark" href="/product">Product</a>
                <a class="nav-link text-dark" href="/our-team">Our Team</a>
                <a class="nav-link text-dark" href="/contact-us">Contact Us</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        @yield('content')
    </div>

    <footer class="bg-light text-center py-3 border-top mt-auto">
        <p class="mb-0 text-muted">&copy; 2026 BagelenGoo. All rights reserved.</p>
    </footer>
</body>

</html>
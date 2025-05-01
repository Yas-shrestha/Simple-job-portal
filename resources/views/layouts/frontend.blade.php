<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELEVATE</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>


    <header class="site-header">
        <div class="header-container">
            <h1 class="brand-name">ELEVATE WORKFORCE</h1>
            <nav class="main-nav">
                <a href="/" class="nav-link">HOME</a>
                <a href="{{ route('jobs') }}" class="nav-link">JOBS</a>
                <a href="{{ route('contact') }}" class="nav-link">CONTACT</a>
            </nav>
        </div>
    </header>

    @yield('content')


    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-info">
                <div class="footer-brand">
                    <h2 class="footer-title">ELEVATE</h2>
                    <h3 class="footer-subtitle">WORKFORCE</h3>
                    <address class="footer-address">
                        <p>Kattimandu, Nepal</p>
                        <p class="phone">+877:1.73456789</p>
                        <p class="email">info@elevateworkforsce.com</p>
                    </address>
                </div>

                <div class="footer-links">
                    <h3 class="footer-heading">Company</h3>
                    <nav class="footer-nav">
                        <a href="#" class="footer-link">About</a>
                        <a href="#" class="footer-link">Jobs</a>
                        <a href="#" class="footer-link">Contact</a>
                    </nav>
                </div>

                <div class="footer-legal">
                    <h3 class="footer-heading">Legal</h3>
                    <nav class="footer-nav">
                        <a href="#" class="footer-link">Terms</a>
                        <a href="#" class="footer-link">Privacy</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="footer-copyright">ELEVATE WORKFORCE</div>
    </footer>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - BizLand Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{asset ('user/assets/img/favicon.png') }}" rel="icon">
  <link href="{{asset ('user/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset ('user/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{asset ('user/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset ('user/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Updated: Dec 05 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header sticky-top">

    {{-- <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a
              href="mailto:contact@example.com">contact@example.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar --> --}}

    <div class="branding d-flex align-items-cente">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="{{asset ('user/assets/img/logo.png') }}" alt=""> -->
          <h1 class="sitename">GoKid</h1>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/desa-wisata">Desa Wisata</a></li>
            <li><a href="/maut">Penentuan</a></li>
            <li><a href="/petunjuk">Petunjuk</a></li>
            <li><a href="/pengembang">Pengembang</a></li>
            @guest
            <li><a href="/login"><i class="bi bi-box-arrow-in-right"></i>Login</a></li>
            @else
            <!-- Tampilkan ini jika user sudah login -->
            @can('admin')
            @endcan
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item d-flex align-items-center" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-door-closed"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        @endguest
         </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    @stack('hero')

    <main class="main">
        @yield('main')
    </main>

    <footer id="footer" class="footer">
        <div class="container footer-top">
          <div class="row gy-4">
            <div class="col-lg-5 col-md-6 footer-about">
              <a href="index.html" class="d-flex align-items-center">
                <span class="sitename">GoKid</span>
              </a>
              <div class="footer-contact pt-3">
                <p>Penentuan Desa Wisata Terfavorit</p>
                <p>Metode MAUT</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-3 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Desa Wisata</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Penentuan</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Petunjuk</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Pengembang</a></li>
              </ul>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
                <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
              </ul>
            </div>
          </div>
        </div>


        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1 sitename">GoKid</strong> <span>All Rights Reserved</span></p>
            <p>Made with ❤️ for travelers and explorers</p>
        </div>
    </footer>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{asset ('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{asset ('user/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{asset ('user/assets/js/main.js') }}"></script>

</body>

</html>

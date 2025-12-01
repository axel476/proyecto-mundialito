<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - iPortfolio Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Importando jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <!-- Importando jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js" ></script>
    <!-- Importando SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Importando archivos js de bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Importar css de bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Importando iconos de font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- importando datatables-->
        <link rel="stylesheet" href="//cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">

    <script src="//cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>

  <!-- Favicons -->
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="profile-img">
      <img src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/img/my-profile-img.jpg') }}" alt="" class="img-fluid rounded-circle">
    </div>

    <a href="" class="logo d-flex align-items-center justify-content-center">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">Chivo Violencia</h1>
    </a>

    <div class="social-links text-center">
      <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
      <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
    </div>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="{{ route('deportistas.index') }}" class="active"><i class="bi bi-house navicon"></i>Deportistas</a></li>
        <li><a href="{{ route('disciplinas.index') }}"><i class="bi bi-person navicon"></i> Disciplinas</a></li>
        <li><a href="{{ route('paises.index') }}"><i class="bi bi-file-earmark-text navicon"></i> Paises</a></li>
        <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
        <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
        <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Dropdown 1</a></li>
            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="#">Deep Dropdown 1</a></li>
                <li><a href="#">Deep Dropdown 2</a></li>
                <li><a href="#">Deep Dropdown 3</a></li>
                <li><a href="#">Deep Dropdown 4</a></li>
                <li><a href="#">Deep Dropdown 5</a></li>
              </ul>
            </li>
            <li><a href="#">Dropdown 2</a></li>
            <li><a href="#">Dropdown 3</a></li>
            <li><a href="#">Dropdown 4</a></li>
          </ul>
        </li>
        <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Cerrar Sesion</a></li>
      </ul>
    </nav>

  </header>
  

  </main>
  

  <footer id="footer" class="footer position-relative light-background">
    @yield('contenido')

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('static/plantilla/iPortfolio-1.0.0/assets/js/main.js') }}"></script>

</body>

</html>


 <!-- Scripts -->
  <script type="text/javascript" src="{{ asset('static/plantilla/tripbiz/js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('static/plantilla/tripbiz/js/bootstrap.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
  <script>
    $(".js-range-slider").ionRangeSlider({
      skin: "round",
      type: "double",
      min: 200,
      max: 10000,
      from: 200,
      to: 500,
      grid: true
    });
  </script>


<style>
  .error{
      color: red;
      font-weight: bold;
  }

  .form-control.error{
      border:1px solid red;
      
  }
</style>









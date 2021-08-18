<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>SyntraTech</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="assets/css/theme.css" rel="stylesheet" />
    <link href="/assets/css/custom.css" rel="stylesheet" />

  </head>


  <body>
    @include('sweetalert::alert')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="#"><img src="assets/img/icons/logo.png" alt="" width="30" /><span class="text-1000 fs-1 ms-2 fw-medium">SYNTRA<span class="fw-bold">Tech</span></span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              {{-- <li class="nav-item"><a class="nav-link active active" href="/">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="/student">Student</a></li>
              <li class="nav-item"><a class="nav-link" href="/teacher">Teachers</a></li>
              <li class="nav-item"><a class="nav-link" href="/location">Locations</a></li>
              <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li> --}}
              
              <li class="nav-item"><a class="{{Request::path() === '/' ? 'nav-link active active' : 'nav-link' }}" href="/">Home</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'student' ? 'nav-link active active' : 'nav-link' }}" href="/student">Studenten</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'teacher' ? 'nav-link active active' : 'nav-link' }}" href="/teacher">Docenten</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'courses' ? 'nav-link active active' : 'nav-link' }}" href="/courses">Aanbod</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'location' ? 'nav-link active active' : 'nav-link' }}" href="/location">Locaties</a></li>
              <li class="nav-item"><a class="{{Request::path() === 'contact' ? 'nav-link active active' : 'nav-link' }}" href="/contact">Contact</a></li>
  
             {{-- if path equals to value then change class to active else use default class --}}

            </ul>
            <form class="d-flex py-3 py-lg-0">
              @guest <a href="/admin" class="btn btn-link text-1000 fw-medium order-1 order-lg-0">Sign in</a> @endguest
              <a href="/signup" class="btn btn-outline-danger rounded-pill order-0">Sign Up</a>
            </form>
          </div>
        </div>
      </nav>

      @yield('intro')
      @yield('numbers')
      @yield('locations')
  
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5 bg-100">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-6 col-sm-4 col-md-2 mb-2 mb-md-0"><img class="img-fluid" src="assets/img/gallery/netflix.png" alt="" height="50" /></div>
            <div class="col-6 col-sm-4 col-md-2 mb-2 mb-md-0"><img class="img-fluid" src="assets/img/gallery/reddit.png" alt="" height="50" /></div>
            <div class="col-6 col-sm-4 col-md-2 mb-2 mb-md-0"><img class="img-fluid" src="assets/img/gallery/amazon.png" alt="" height="50" /></div>
            <div class="col-6 col-sm-4 col-md-2 mb-2 mb-sm-0"><img class="img-fluid" src="assets/img/gallery/discord.png" alt="" height="50" /></div>
            <div class="col-6 col-sm-4 col-md-2 mb-2 mb-sm-0"><img class="img-fluid" src="assets/img/gallery/spotify.png" alt="" height="50" /></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->







      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5 z-index-1" style="margin-bottom: -10rem">

        <div class="container">
          <div class="card py-5 px-5 border-0 shadow-sm">
            <div class="card-body">
              <div class="row flex-center">
                <div class="col-12 col-lg-6 text-lg-start">
                  <h2>Onze nieuwsbrief <br />Heet van de naald!</h2>
                  <p class="mb-lg-0">Blijf op de hoogte van onze innovatieve opleidingen en aanbod.</p>
                </div>
                <div class="col-12 col-lg-6 text-lg-end"><a class="btn btn-lg btn-danger hover-top btn-glow text-end" href="#">Inschrijven</a></div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      @include('layout.footer')
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/@popperjs/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  </body>

</html>
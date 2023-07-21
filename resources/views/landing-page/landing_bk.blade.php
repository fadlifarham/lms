<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8">
  <title>BisnisKita - For Better Indonesia</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style2.css" rel="stylesheet">
  <link href="css/util.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 

</head>

<body>

  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <!-- Uncomment below if you prefer to use a text logo -->
        <!-- <h1><a href="#main">C<span>o</span>nf</a></h1>-->
        <a href="#intro" class="scrollto"><img src="img/logo.png" alt="" title=""></a>
      </div>
      <div class="float-right">
        <button class="btn btn-danger" onclick="window.location.href='{{ route('login') }}'">Login</button>
      </div>
    </div>

  </header><!-- #header -->

   <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="row">
    <div class="intro-container wow fadeIn col-lg-4 col-md-6">
        <h1 class="mb-4 pb-0"><span>Bisnis</span>Kita</h1>
        <p class="ml-2 mb-4 pb-0">BisnisKita adalah platform belajar <br>bisnis & finansial terlengkap<br>di Indonesia<br><br></p>
      <div class="countdownme">
        <div class="flex-w flex-c-m cd100 wsize1 m-lr-auto p-t-116">
          <div class=""><br>
          </div>

          <div class=""><br>
          </div>

          <div class="">
          </div>

          <div class="">
          </div>
        </div>
      </div>
      
    </div>

    </div>
    <div class="intro-container wow fadeIn"><br><br><br>
      <a href="https://youtu.be/YE4dP24zrwY" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
    </div>
  </section>


  <main id="main">
    <section id="hotels" class="wow fadeInUp">

      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6">
              <div class="hotel-img">
                <img src="img/1.jpg" alt="Modul Gratis" class="img-fluid">
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <h2><strong>Modul Gratis untuk 1000 pendaftar</strong></h2><br>
            <button type="button" class="btn btn-danger" onclick="window.location.href='{{ route('register') }}'">Dapatkan Sekarang!</button>
            </div>
          </div>
        </div>
      </div>

    </section>

    <!--==========================
      Hotels Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Keunggulan BisnisKita</h2>
        </div>

        <div class="row">
         <div class="col-lg-4 col-md-6">
            <h3><a href="#">Konten Lengkap</a></h3>
              <div class="hotel-img">
                <img src="{{ asset('img/unggul1.JPG') }}" alt="Keunggulan 1" class="img-fluid">
              </div>
              <p><br>Tersedia berbagai macam modul dalam lingkup bisnis dan finasial yang langsung dipandu oleh para pakar di bidang bisnis</p>
          </div>

          <div class="col-lg-4 col-md-6">
            <h3><a href="#">Pembimbingan Komprehensif</a></h3>
              <div class="hotel-img">
                <img src="{{ asset('img/unggul2.JPG') }}" alt="Keunggulan 2" class="img-fluid">
              </div>
              <p><br>Pengguna akan dibimbing sekaligus diawasi dalam proses belajar mulai dari nol, diharapkan melaui metode ini penguna tidak hanya berhenti sampai level belajar, namun hingga level memahami.</p>
          </div>

          <div class="col-lg-4 col-md-6">
            <h3><a href="#">Metode Terstruktur</a></h3>
              <div class="hotel-img">
                <img src="{{ asset('img/unggul3.JPG') }}" alt="Keunggulan 3" class="img-fluid">
              </div>
              <p><br>Metode pengajaran yang diberikan merupakan best practice yang telah teruji selama bertahun-tahun yang diterapkan oleh para pakar di bidang bisnis dan finasial.</p>
          </div>
        </div>
      </div>
    </section>

    <!--==========================
      Gallery Section
    ============================-->
    <!-- Section: Testimonials v.2 -->
<section class="text-center my-5">

<!-- Section heading -->
<h2 class="h1-responsive font-weight-bold my-5">Apa Kata Mereka?</h2>

<div class="wrapper-carousel-fix container">
  <!-- Carousel Wrapper -->
  <div id="carousel-example-1" class="carousel no-flex testimonial-carousel slide carousel-fade" data-ride="carousel"
    data-interval="false">
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <!--First slide-->
      <div class="carousel-item active">
        <div class="testimonial">
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(30).jpg" class="rounded-circle img-fluid"
              alt="First sample avatar image">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod
            eos
            id officiis hic tenetur quae quaerat ad velit ab. Lorem ipsum dolor sit amet, consectetur
            adipisicing elit. Dolore cum accusamus eveniet molestias voluptatum inventore laboriosam labore
            sit, aspernatur praesentium iste impedit quidem dolor veniam.
          </p>
          <h4 class="font-weight-bold">Anna Deynah</h4>
          <h6 class="font-weight-bold my-3">Founder at ET Company</h6>
          <!--Review-->
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star-half-alt blue-text"> </i>
        </div>
      </div>
      <!--First slide-->
      <!--Second slide-->
      <div class="carousel-item">
        <div class="testimonial">
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(31).jpg" class="rounded-circle img-fluid"
              alt="Second sample avatar image">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
            odit
            aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque
            porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia
            non numquam eius modi tempora incidunt ut labore. </p>
          <h4 class="font-weight-bold">Maria Kate</h4>
          <h6 class="font-weight-bold my-3">Photographer at Studio LA</h6>
          <!--Review-->
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
        </div>
      </div>
      <!--Second slide-->
      <!--Third slide-->
      <div class="carousel-item">
        <div class="testimonial">
          <!--Avatar-->
          <div class="avatar mx-auto mb-4">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(3).jpg" class="rounded-circle img-fluid"
              alt="Third sample avatar image">
          </div>
          <!--Content-->
          <p>
            <i class="fas fa-quote-left"></i> Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus
            error sit voluptatem accusantium doloremque laudantium.</p>
          <h4 class="font-weight-bold">John Doe</h4>
          <h6 class="font-weight-bold my-3">Front-end Developer in NY</h6>
          <!--Review-->
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="fas fa-star blue-text"> </i>
          <i class="far fa-star blue-text"> </i>
        </div>
      </div>
      <!--Third slide-->
    </div>
    <!--Slides-->
    <!--Controls-->
    <a class="carousel-control-prev left carousel-control" href="#carousel-example-1" role="button"
      data-slide="prev">
      <span class="icon-prev" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next right carousel-control" href="#carousel-example-1" role="button"
      data-slide="next">
      <span class="icon-next" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--Controls-->
  </div>
  <!-- Carousel Wrapper -->
</div>

</section>
<!-- Section: Testimonials v.2 -->


    <!--==========================
      Sponsors Section
    ============================-->
    <section id="supporters" class=" wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Partner Kami</h2>
        </div>

        <div class="row no-gutters supporters-wrap clearfix">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/2.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/3.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/4.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/5.png" class="img-fluid" alt="">
            </div>
          </div>
        
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/6.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/7.png" class="img-fluid" alt="">
            </div>
          </div>
          
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="img/supporters/8.png" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>

    <!--==========================
      Sponsors Section
    ============================-->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="img/logo.png" alt="TheEvenet">
          </div>

  <!--==========================
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Footer Menu 1</h4>
            <ul>
              <li> <a href="#">Menu 1</a></li>
              <li> <a href="#">Menu 2</a></li>
              <li> <a href="#">Menu 3</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Footer Menu 2</h4>
            <ul>
              <li> <a href="#">Menu 1</a></li>
              <li> <a href="#">Menu 2</a></li>
              <li> <a href="#">Menu 3</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Footer Menu 3</h4>
            <ul>
              <li> <a href="#">Menu 1</a></li>
              <li> <a href="#">Menu 2</a></li>
              <li> <a href="#">Menu 3</a></li>
            </ul>
          </div>
----->

          <div class="col-lg-3 col-md-6 float-right footer-contact">
            <div class="social-links float-right">
              <a href="https://twitter.com/bisniskita?lang=en" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="http://www.facebook.com/bisniskitadotcom" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/bisniskita/?hl=en" target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://t.me/bisniskitadotcom" target="_blank" class="telegram"><i class="fa fa-telegram"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright 2019 <strong>BisnisKita</strong>. All Rights Reserved.
      </div>
    </div>

    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

   <!--===============================================================================================-->  
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/moment.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script>
    $('.cd100').countdown100({
      /*Set Endtime here*/
      /*Endtime must be > current time*/
      endtimeYear: 2019,
      endtimeMonth: 8,
      endtimeDate: 1,
      endtimeHours: 0,
      endtimeMinutes: 0,
      endtimeSeconds: 0,
      timeZone: "Asia/Jakarta" 
      // ex:  timeZone: "America/New_York"
      //go to " http://momentjs.com/timezone/ " to get timezone
    });
  </script>
<!--===============================================================================================-->
  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>
</body>

</html>

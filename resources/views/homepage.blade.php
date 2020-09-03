<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $general->title }}</title>
  <meta content="{{ $general->meta_desc }}" name="descriptison">
  <meta content="{{ $general->keyword }}" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('storage/'.$general->favicon) }}" rel="icon">
  <link href="{{asset('storage/'.$general->favicon)  }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-transparent">
    <div class="container text-right">
      <i class="icofont-phone"></i> {{ $general->phone }}
      <i class="icofont-clock-time icofont-rotate-180"></i> {{ $general->workday }}: {{ $general->worktime }}
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="{{ route('homepage') }}"><span>{{ $general->name }}</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="{{asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>

          <li class="book-a-table text-center"><a href="#book-a-table">Book a table</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          @foreach ($banner as $key => $banner)
        
          <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background: url({{asset('storage/'.$banner->cover)}});">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">{{ $banner->title }}</h2>
                <p class="animate__animated animate__fadeInUp">{{ $banner->desc }}</p>
                <div>
                  <a href="{{ $banner->link }}" class="btn-menu animate__animated animate__fadeInUp scrollto">Link</a>
                </div>
              </div>
            </div>
          </div>

          @endforeach

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url({{asset('storage/'.$about->cover) }});'>
            <a href="{{ $about->link }}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3><strong>{{ $about->title }}</strong></h3>
              <p>
                {{ $about->desc }}
              </p>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Whu Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2>Why choose <span>Our Restaurant</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">

          @foreach ($why as $why)
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="box">
              <span>0{{ $why->id }}</span>
              <h4>{{ $why->title }}</h4>
              <p>{{ $why->desc }}</p>
            </div>
          </div>
          @endforeach
         
        </div>

      </div>
    </section><!-- End Whu Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              <li data-filter="*" class="filter-active">Show All</li>
              @foreach ($category as $category)
              <li data-filter=".filter-{{ $category->id }}">{{ $category->name }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row menu-container">
          @foreach ($menu as $menu)
          <div class="col-lg-6 menu-item filter-{{ $menu->category_id }}">
            <div class="menu-content">
              <a href="#">{{ $menu->name }}</a><span>Rp. {{ number_format($menu->price,2,',','.') }}</span>
            </div>
            <div class="menu-ingredients">
              {{ $menu->ingredient }}
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container">

        <div class="section-title">
          <h2>Check our <span>Specials</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          @foreach ($tabspecial as $key => $special)
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              
              <li class="nav-item">
                <a class="nav-link {{ $key == 0 ? 'active show' : '' }}" data-toggle="tab" href="#tab-{{ $special->id }}">{{ $special->title }}</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane {{ $key == 0 ? 'active show' : '' }}" id="tab-{{ $special->id }}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>{{ $special->subject }}</h3>
                    <p class="font-italic">{{ $special->desc }}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset('storage/'.$special->cover)}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Events Section ======= -->
    <section id="events" class="events">
      <div class="container">

        <div class="section-title">
          <h2>Organize Your <span>Events</span> in GoMadhang</h2>
        </div>

        <div class="owl-carousel events-carousel">
            @foreach ($event as $event)
            <div class="row event-item">
                <div class="col-lg-6">
                  <img src="{{asset('storage/'.$event->cover)}}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                  <h3>{{ $event->title }}</h3>
                  <div class="price">
                    <p><span>{{ $event->price }}</span></p>
                  </div>
                  <p class="font-italic">
                    {{$event->desc}}
                  </p>
                  {{-- <ul>
                    <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                  </ul>
                  <p>
                    Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur
                  </p> --}}
                </div>
              </div>
            @endforeach
          

          {{-- <div class="row event-item">
            <div class="col-lg-6">
              <img src="{{asset('assets/img/event-private.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Private Parties</h3>
              <div class="price">
                <p><span>$290</span></p>
              </div>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="{{asset('assets/img/event-custom.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Custom Parties</h3>
              <div class="price">
                <p><span>$99</span></p>
              </div>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="icofont-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="icofont-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container">

        <div class="section-title">
          <h2>Book a <span>Table</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        @if (session('error'))
            
        <div class="alert alert-danger">
    
          {{ session('error') }}
    
        </div>
    
        @endif    
    
        @if (session('success'))

        <div class="alert alert-success">

          {{ session('success') }}

        </div>

        @endif

        <form action="{{ route('booking') }}" method="POST" class="php-email-form">
          @csrf
          <div class="form-row">
            <div class="col-lg-4 col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" >
              <div class="invalid-feedback">
                  
                {{ $errors->first('name') }}    
            
              </div> 
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
              <div class="invalid-feedback">
                  
                {{ $errors->first('email') }}    
            
              </div> 
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="number" class="form-control" name="phone" id="phone" placeholder="Your Phone">
              <div class="invalid-feedback">
                  
                {{ $errors->first('number') }}    
            
              </div> 
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="date" name="date" class="form-control" id="date" placeholder="Date"  min="{{ date("Y-m-d") }}">
              <div class="invalid-feedback">
                  
                {{ $errors->first('date') }}    
            
              </div> 
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="time" class="form-control" name="time" id="time" placeholder="Time" >
              <div class="invalid-feedback">
        
                {{ $errors->first('time') }}    
            
              </div> 
            </div>
            <div class="col-lg-4 col-md-6 form-group">
              <input type="number" class="form-control" name="people" id="people" placeholder="# of people">
              <div class="invalid-feedback">
                  
                {{ $errors->first('people') }}    
            
              </div> 
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
            <div class="invalid-feedback">
                  
              {{ $errors->first('message') }}    
          
            </div> 
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid">

        <div class="section-title">
          <h2>Some photos from <span>Our Restaurant</span></h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row no-gutters">

          @foreach ($gallery as $item)
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="{{asset('storage/'.$item->cover)}}" class="venobox" data-gall="gallery-item">
                <img src="{{asset('storage/'.$item->cover)}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="owl-carousel testimonials-carousel">

          @foreach ($testi as $testi)
          <div class="testimonial-item">
            <img src="{{asset('storage/'.$testi->photo)}}" class="testimonial-img" alt="">
            <h3>{{ $testi->name }}</h3>
            <h4>{{ $testi->address }}</h4>
            <div class="stars">
              @if($testi->star == 1)
              <i class="icofont-star"></i>
              @elseif($testi->star == 2)
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              @elseif($testi->star == 3)
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              @elseif($testi->star == 4)
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              @elseif($testi->star == 5)
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              <i class="icofont-star"></i>
              @endif
            </div>
            <p>
              <i class="bx bxs-quote-alt-left quote-icon-left"></i>
              {{ $testi->desc }}
              <i class="bx bxs-quote-alt-right quote-icon-right"></i>
            </p>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2><span>Contact</span> Us</h2>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>
      </div>

      <div class="map">
        <iframe style="border:0; width: 100%; height: 350px;" src="{{ $general->gmaps }}" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container mt-5">

        <div class="info-wrap">
          <div class="row">
            <div class="col-lg-3 col-md-6 info">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>{{ $general->address }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-clock-time icofont-rotate-90"></i>
              <h4>Open Hours:</h4>
              <p>{{ $general->workday }}:<br>{{ $general->worktime }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>{{ $general->email }}</p>
            </div>

            <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>{{ $general->phone }}</p>
            </div>
          </div>
        </div>
        @if (session('error'))
            
        <div class="alert alert-danger">
    
          {{ session('error') }}
    
        </div>
    
        @endif    
    
        @if (session('success'))

        <div class="alert alert-success">

          {{ session('success') }}

        </div>

        @endif
        <form action="{{ route('inbox') }}" method="POST" class="php-email-form">
          @csrf
          <div class="form-row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required/>
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required />
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required />
            <div class="validate"></div>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" required></textarea>
            <div class="validate"></div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="social-links">
        <a href="{{ $general->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $general->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $general->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>{{ $general->footer }}</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  {{-- <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script> --}}
  <script src="{{asset('assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
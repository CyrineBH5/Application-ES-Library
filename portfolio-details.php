<?php
require_once "../config/config.php";
require_once "class/Livre.php";
//include "layout.php";
session_start();

$config_base = new config();
$bd = $config_base->getConnexion();
$livre = new Livre();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Book Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="assets/img/livre1.png" rel="icon">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="Espace_membre.php"><i class="bi bi-book"></i>&nbsp; Es-Library</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#books">Books</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="nav-link scrollto" href="login.php"><i class="bi bi-person-square"></i>&nbsp; &nbsp;Sign In</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="Espace_membre.php">Home</a></li>
          <li style="color:crimson">Book Details</li>
        </ol>
        <h2>Book Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->
    <?php if (isset($_GET['idi'])) {
      $id = $_GET['idi'];
      $app = $livre->getBookByID($id);

    ?>
      <!-- ======= Portfolio Details Section ======= -->
      <section id="portfolio-details" class="portfolio-details">
        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">

                  <div class="swiper-slide" style="display: flex; justify-content: center; align-items: center;">
                    <img src="assets/img/<?= $app[0]['Image'] ?>" alt="book" style="max-width: 300px; max-height: 600px;">
                  </div>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3>Book information</h3>

                <ul>
                  <li><strong>ISBN</strong> : <?= $app[0]['ISBN'] ?></li>
                  <li><strong>Author</strong> : <?= $app[0]['auteur'] ?></li>
                  <li><strong>Category</strong> : <?= '<span style=color:red>' . $app[0]['categorie'] . '</span>' ?></li>
                  <li><strong>Date of Edition</strong> : <?= $app[0]['date_edition'] ?></li>
                  <br>
                  <a href="../login.php">
                    <button type="button" style="margin-left:61%" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xxs px-4 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                      <i class="bi bi-bag-check-fill"></i>
                      &nbsp; <span style="font-size: 13px;">Reserve</span>
                    </button>
                  </a>


                </ul>
              </div>
              <div class="portfolio-description">
                <h2>Details</h2>
                <p>
                  <?= $app[0]['description'] ?>
                </p>
              </div>
            </div>
          <?php } ?>
          </div>

        </div>
      </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>ES-Library</h3>
            <p>
              A98 Rue de la République<br>
              Megrine Tunisia<br><br>
              <strong>Phone:</strong> +216 95 972 018<br>
              <strong>Email:</strong> es-library@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#books">Books</a></li>
            </ul>
          </div>
          &nbsp; &nbsp;
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Follow us</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">GitHub</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Linkedin</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">ES_library1</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Legal</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms & Conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Support</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-6 footer-links" style="display: flex; align-items: flex-start;">
            <img src="../images/join1.png" alt="logo" style="max-width: 200px; max-height: 150px; margin-left: 50%; margin-right: auto;">
          </div>



        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>ES-Library</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Dandeni Eya & Ben Hlila Cyrine</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>
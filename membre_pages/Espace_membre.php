<?php
require "../config/config.php";
require_once "../class/Livre.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("location:Espace_membre.php");
    exit;
}
$config_base = new config();
$bd = $config_base->getConnexion();
$livre = new Livre($bd);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>ES-Library</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/livre1.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top " style="background-color:black; padding: bottom 2px">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="Espace_membre.php"><i class="bi bi-book"></i> ES-Library</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar" style="margin-bottom:-1%; margin-top:-1%">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#books">Books</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="nav-link scrollto" href="../membre_pages/historique_reservation.php">History</a></li>
                    <li><a class="nav-link scrollto" href="profile_membre.php"><i class="bi bi-person-square"></i>&nbsp;&nbsp; Profile</a></li>
                    <li><a class="nav-link scrollto" href="../logout.php" style="background-color:crimson;padding: 10px;border-radius: 25px;  font-size:11px"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <h2 style="color:lightgoldenrodyellow">We make a book of what we know and <br>
                a library of what we don’t know.
            </h2>
            <!--  search ... -->

            <a href="#books" class="btn-get-started scrollto"><i class=" bi bi-wallet"></i>&nbsp; CHECK BOOKS</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">



        <!-- ======= Team Section ======= -->
        <section id="books" class="team" style="margin-top:-1%">
            <div class="container">
                <div class="section-title">
                    <h2>BOOKS</h2>
                    <h3>Our<span> Books</span></h3>
                </div>
                <div class="mb-3" style="margin-left:70%; padding:-1%">
                    <div class="relative mb-4 flex w-full flex-wrap items-stretch">
                        <input type="search" name="recherche" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" placeholder="Search" aria-label="Search" aria-describedby="button-addon1" />

                        <!-- Search button -->
                        <button class="relative z-[2] flex items-center rounded-r bg-pink-500 px-4 py-2 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-pink-700 hover:shadow-lg focus:bg-pink-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-pink-800 active:shadow-lg" type="button" id="button-addon1" data-te-ripple-init data-te-ripple-color="light">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                            </svg>
                        </button>

                    </div>
                </div>


                <div class="row">

                    <?php
                    $rows = $livre->getAllBooks();
                    //var_dump($rows);
                    foreach ($rows as $row) {

                    ?>


                        <div class="col-lg-2 col-md-6 d-flex align-items-stretch">
                            <div class="member">
                                <div class="member-img">
                                    <img src="../assets/img/<?= $row['Image'] ?>" class="img-fluid" alt="">
                                    <div class="social">

                                        <a href="../assets/img/<?= $row['Image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="<?= "Title : " . $row['titre'] . "</br> Author :" . $row['auteur'] . "</br> Edition : " . $row['date_edition'] ?>"><i class="bx bx-plus"></i></a>
                                        <a href="portfolio-detail1.php?idi=<?php echo ($row['id']);  ?>" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>

                                <div class="member-info">
                                    <h4><?php echo $row['titre']; ?></h4>
                                    <span style="text-align:left">Author : <?php echo $row['auteur']; ?><br>
                                        Category : <?php echo $row['categorie']; ?></span>
                                </div>

                            </div>
                        </div>
                    <?php

                    }

                    ?>
                </div>

                <div class="text-center" id="voir">
                    <button type="button" class="text-white bg-pink-300 hover:bg-pink-400 focus:outline-none focus:ring-4 focus:ring-pink-200 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-pink-700 dark:hover:bg-pink-800 dark:focus:ring-pink-900">View more</button>
                </div>


            </div>

        </section><!-- End Team Section -->
        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container">

                <div class="text-center">
                </div>

            </div>
        </section><!-- End Cta Section -->
        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Learn More <span>About Us</span></h3>
                    <p style="font-size:20px; font-weight:400; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"> Welcome to our library, where knowledge meets imagination.<br> Discover a vast collection of books, engaging programs, and a welcoming community. Embrace the joy of reading, explore digital resources, and embark on endless literary adventures. Join us on a journey of discovery and lifelong learning.
                    </p>
                </div>
            </div>
        </section>

        <!-- End About Section -->
        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class=" container">

                <div class="text-center">
                </div>

            </div>
        </section><!-- End Cta Section -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3>Contact <span>Us</span></h3>

                </div>

                <div>
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
                </div>




                <div class="row mt-5 align-items-stretch">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="info h-100 d-flex flex-column justify-content-center align-items-center">
                            <br>
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>A98 Rue de la République Megrine Tunisia</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="info h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>es-library@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="info h-100 d-flex flex-column justify-content-center align-items-center">
                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+216 95 972 018</p>
                            </div>
                        </div>
                    </div>
                </div>


        </section><!-- End Contact Section -->

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
                    Designed by <a href="https://bootstrapmade.com/"><span style="color:mediumvioletred">Dandeni Eya & Ben Hlila Cyrine</span></a>
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
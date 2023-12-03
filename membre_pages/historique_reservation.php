<?php
require "../config/config.php";
require_once "../class/reservation.php";
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $config_base = new config();
    $bd = $config_base->getConnexion();
    $reservation = new Reservation($bd);
    $app = $reservation->getReservationByuser_id($user_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Reservations list </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/img/livre1.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <link href="../assets/img/livre1.png" rel="icon">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-image: url(../images/img4.jpg);
            margin-top: 20px;
        }

        /* booking */

        .bg-light-blue {
            background-color: #e9f7fe !important;
            color: #3184ae;
            padding: 7px 18px;
            border-radius: 4px;
        }

        .bg-light-green {
            background-color: rgba(40, 167, 69, 0.2) !important;
            padding: 7px 18px;
            border-radius: 4px;
            color: #28a745 !important;
        }

        .buttons-to-right {
            position: absolute;
            right: 0;
            top: 40%;
        }

        .btn-gray {
            color: #666;
            background-color: #eee;
            padding: 7px 18px;
            border-radius: 4px;
        }

        .booking:hover .buttons-to-right .btn-gray {
            opacity: 1;
            transition: .3s;
        }

        .buttons-to-right .btn-gray {
            opacity: 0;
            transition: .3s;
        }

        .btn-gray:hover {
            background-color: #36a3f5;
            color: #fff;
        }

        .booking {
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
            padding-bottom: 30px;
        }

        .booking:last-child {
            margin-bottom: 0px;
            border-bottom: none;
            padding-bottom: 0px;
        }

        @media screen and (max-width: 575px) {
            .buttons-to-right {
                top: 10%;
            }

            .buttons-to-right a {
                display: block;
                margin-bottom: 20px;
            }

            .buttons-to-right a:last-child {
                margin-bottom: 0px;
            }

            .bg-light-blue,
            .bg-light-green,
            .btn-gray {
                padding: 7px;
            }
        }

        .card {
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
            border-radius: 4px;
            box-shadow: none;
            border: none;
            padding: 25px;
        }

        .mb-5,
        .my-5 {
            margin-bottom: 3rem !important;
        }

        .msg-img {
            margin-right: 20px;
        }

        .msg-img img {
            width: 60px;
            border-radius: 50%;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <header id="header" class="fixed-top header-inner-pages">

        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="Espace_membre.php"><i class="bi bi-book"></i>&nbsp; Es-Library</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="Espace_membre.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="Espace_membre.php">About</a></li>
                    <li><a class="nav-link scrollto" href="Espace_membre.php">Books</a></li>
                    <li><a class="nav-link scrollto" href="Espace_membre.php">Contact</a></li>
                    <li><a class="nav-link scrollto" href="historique_reservation.php">History</a></li>
                    <li><a class="nav-link scrollto" href="profile_membre.php"><i class="bi bi-person-square"></i>&nbsp; &nbsp; Profile</a></li>
                    <li><a class="nav-link scrollto" href="../logout.php" style="background-color:crimson;padding: 10px;border-radius: 25px;  font-size:11px"><i class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>

    </header>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-9" style="margin-left:13%">
                <div class="card card-white mb-5">
                    <div class="card-heading clearfix border-bottom mb-4">
                        <h4 class="card-title">- Reservations list - </h4>
                    </div>
                    <?php foreach ($app as $row) { ?>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="position-relative booking">
                                    <div class="media">

                                        <div>
                                            <img src="../assets/img/<?= $row['Image'] ?>" style="width: 160px;" alt="book image">
                                        </div>
                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                        &nbsp; &nbsp;
                                        &nbsp; &nbsp;

                                        <div class=" media-body">

                                            <h5 class="mb-4"> Title : <?= $row['titre'] ?> &nbsp; &nbsp; <span class="badge badge-primary mx-3"><?= $row['etat'] ?></span></h5>
                                            <div class="mb-3">
                                                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">ISBN : </span>
                                                <span><?= $row['ISBN'] ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Author : </span>
                                                <span><?= $row['auteur'] ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Category :</span>
                                                <span style="color:red"><strong><?= $row['categorie'] ?></strong></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0">Edition date :</span>
                                                <span class="bg-light-blue"><?= $row['date_edition'] ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <span class="mr-2 d-block d-sm-inline-block mb-2 mb-sm-0"><strong><em>Reservation date :</em></strong></span>
                                                <span class="bg-light-blue"><?= $row['date_reservation'] ?></span>
                                            </div>

                                        </div>



                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
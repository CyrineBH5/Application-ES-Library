<?php
require_once "../config/config.php";
require_once "../class/fn_membre.php";
require_once "../class/Livre.php";
require_once "../class/reservation.php";
session_start();
$config_base = new config();
$bd = $config_base->getConnexion();
$membre = new fn_membre($bd);
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $app = $membre->getMemberById($user_id);
}
$livre = new Livre($bd);
if (isset($_GET['idi'])) {
    $id = $_GET['idi'];
    $book = $livre->getBookByID($id);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">


        <title>Reserse page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="../assets/img/livre1.png" rel="icon">
        <style type="text/css">
            body {
                background-image: url(../images/img4.jpg);
                margin-top: 20px;
            }

            #height {
                width: 100%;
                height: 130vh;
                background: url("../images/img4.jpg") top center;
                background-size: cover;
                position: relative;
            }

            #height:before {

                content: "";
                background: rgba(0, 0, 0, 0.6);
                position: absolute;
                bottom: 0;
                top: 0;
                left: 0;
                right: 0;
            }

            .text-danger strong {
                color: #9f181c;
            }

            .receipt-main {
                background: #ffffff none repeat scroll 0 0;
                border-bottom: 12px solid #333333;
                border-top: 12px solid #9f181c;
                margin-top: 50px;
                margin-bottom: 50px;
                padding: 40px 30px !important;
                position: relative;
                box-shadow: 0 1px 21px #acacac;
                color: #333333;
                font-family: open sans;
            }

            .receipt-main p {
                color: #333333;
                font-family: open sans;
                line-height: 1.42857;
            }

            .receipt-footer h1 {
                font-size: 15px;
                font-weight: 400 !important;
                margin: 0 !important;
            }

            .receipt-main::after {
                background: #414143 none repeat scroll 0 0;
                content: "";
                height: 5px;
                left: 0;
                position: absolute;
                right: 0;
                top: -13px;
            }

            .receipt-main thead {
                background: #414143 none repeat scroll 0 0;
            }

            .receipt-main thead th {
                color: #fff;
            }

            .receipt-right h5 {
                font-size: 16px;
                font-weight: bold;
                margin: 0 0 7px 0;
            }

            .receipt-right p {
                font-size: 12px;
                margin: 0px;
            }

            .receipt-right p i {
                text-align: center;
                width: 18px;
            }

            .receipt-main td {
                padding: 9px 20px !important;
            }

            .receipt-main th {
                padding: 13px 20px !important;
            }

            .receipt-main td {
                font-size: 13px;
                font-weight: initial !important;
            }

            .receipt-main td p:last-child {
                margin: 0;
                padding: 0;
            }

            .receipt-main td h2 {
                font-size: 20px;
                font-weight: 900;
                margin: 0;
                text-transform: uppercase;
            }

            .receipt-header-mid .receipt-left h1 {
                font-weight: 100;
                margin: 34px 0 0;
                text-align: right;
                text-transform: uppercase;
            }

            .receipt-header-mid {
                margin: 24px 0;
                overflow: hidden;
            }

            #container {
                background-color: #dcdcdc;
            }
        </style>
    </head>

    <body>
        <div class="col-md-12" id="height">
            <div class="row">
                <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                    <div class="row">
                        <div class="receipt-header">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="receipt-left">
                                    <img class="img-responsive" alt="iamgurdeeposahan" src="../assets/img/<?= $app[0]['Image'] ?>" style="width: 71px; border-radius: 43px;">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                <div class="receipt-right">
                                    <h5><i class="bi bi-book"></i> ES-Library</h5>
                                    <p><i class="bi bi-telephone"></i>
                                        &nbsp; +216 95972018<i class="fa fa-phone"></i></p>
                                    <p>
                                        <strong>A98 Rue de la<br>République Megrine </strong>
                                    </p>
                                    <p>es-library@gmail.com</p>
                                    <p><i class="fa fa-location-arrow"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="receipt-header receipt-header-mid">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <h5><?= $app[0]['nom'] . ' ' . $app[0]['prenom'] ?></h5>
                                    <p><b>Mobile : </b><?= $app[0]['num_tel'] ?></p>
                                    <p><b>Email : </b> <?= $app[0]['login'] ?></p>
                                    <p><b>Address : </b><?= $app[0]['adresse'] ?></p>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="receipt-left">
                                    <h3></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: center; font-size:large" colspan="2">Reservation Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-md-9">
                                        <center>
                                            <h4 style="font-size:20px"><strong>Title : </strong> <?= $book[0]['titre'] ?></h4>
                                        </center><br>
                                        <span style="font-size:17px; line-height: 1.8;">
                                            <strong>ISBN : </strong> <?= $book[0]['ISBN'] ?><br>
                                            <strong>Category : </strong> <?= $book[0]['categorie'] ?><br>
                                            <strong>Author : </strong> <?= $book[0]['auteur'] ?><br>
                                            <strong>Edition date : </strong> <?= $book[0]['date_edition'] ?><br>

                                        </span>
                                    </td>
                                    <td><img src="../assets/img/<?= $book[0]['Image'] ?>" alt="image book" width="125" height="200"></td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                    <form method="post">
                        <button type="submit" name="confirm" style="margin-left:50%" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xxs px-4 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            <i class="bi bi-bag-check-fill"></i>
                            &nbsp; <span style="font-size: 13px;">Confirm reservation</span>
                        </button>

                        <a href="../membre_pages/portfolio-detail1.php?idi=<?= $book[0]['id'] ?>">
                            <button type="button" style="margin-right:0%; background-color: gray; color: white;" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-xxs px-4 py-2 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                <i class="bi bi-box-arrow-left"></i> &nbsp; <span style="font-size: 13px;">Go back...</span>
                            </button>
                        </a>
                    </form>
                    <div class="row">
                        <div class="receipt-header receipt-header-mid receipt-footer">
                            <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                <div class="receipt-right">
                                    <p><b>Date :</b> <?= $date = date('d F Y'); ?></p>
                                <?php
                            }
                            if (isset($_POST['confirm'])) {
                                $reservation = new Reservation($bd);
                                $np = $app[0]['nom'] . ' ' . $app[0]['prenom'];
                                $etat = "In progress";
                                $reservation->insertReservation($user_id, $np, $app[0]['adresse'], $app[0]['num_tel'], $book[0]['ISBN'], $book[0]['Image'], $book[0]['titre'], $book[0]['auteur'], $book[0]['categorie'], $book[0]['date_edition'], date('Y-m-d'), $etat);
                                //header("location: historique_reservation.php");
                                echo "<h5 style='color: rgb(140, 140, 140);'>Thanks for your reservation.!</h5>";
                            }
                                ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">

        </script>

    </body>

    </html>
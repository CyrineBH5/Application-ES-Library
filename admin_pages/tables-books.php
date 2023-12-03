<?php
require_once "../config/config.php";
require_once "../class/Livre.php";
require_once "../class/fn_admin.php";
session_start();
$config_base = new config();
$bd = $config_base->getConnexion();
$admin = new fn_admin($bd);
if (isset($_SESSION['user_id_ad'])) {
    $user_id = $_SESSION['user_id_ad'];
    $app = $admin->getAdminById($user_id);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/x-icon" href="../images/livre1.png">


    <title>Espace ADMIN</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:black; ">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_ad.php">
                <div class="sidebar-brand-icon rotate">
                    <i class="bi bi-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ES-Library</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard_ad.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Manage Reservation</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tables_member.php">
                    <i class="bi bi-people-fill"></i>
                    <span>Manage Members</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tables-books.php">
                    <i class="bi bi-book-fill"></i>
                    <span>Manage Books</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="../logout.php" data-toggle="modal" data-target="#Modal">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span></a>
            </li>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $app[0]['nom'] . " " . $app[0]['prenom'] ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/<?= $app[0]['Image'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile_admin.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" data-toggle="modal" data-target="#Modal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h7 class="m-0 font-weight-bold " style="color:darkblue;"><i class="bi bi-view-list"></i> LIST BOOKS <a href="inserbook.php" class="btn btn-success" style="font-size:14px; margin-left:80%">Add Books</a></h7>



                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ISBN</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Edition</th>
                                            <th>Author</th>
                                            <th>Category</th>
                                            <th>N° availability</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $livre = new Livre();
                                        $rows = $livre->getAllBooks();
                                        //var_dump($rows);
                                        foreach ($rows as $row) {

                                        ?>
                                            <tr>
                                                <!-- Manque l'image du livre -->
                                                <td><?php echo $row['ISBN']; ?></td>
                                                <td><img src="../assets/img/<?= $row['Image'] ?>" class="img-fluid image-petite" alt=""></td>
                                                <td><?php echo $row['titre']; ?></td>
                                                <td><?php echo $row['auteur']; ?></td>
                                                <td><?php $date = $row['date_edition'];
                                                    echo $date_formatte = date('d/m/Y', strtotime($date));
                                                    ?>
                                                </td>
                                                <td><?php echo $row['categorie']; ?></td>
                                                <td><?php echo $row['nb_dispo']; ?></td>
                                                <td>
                                                    <div id="description-<?php echo $row['id']; ?>" class="description">
                                                        <?php echo $row['description']; ?>
                                                    </div>
                                                    <a onclick="toggleDescription(<?php echo $row['id']; ?>)" class="voir-plus">Voir plus</a>
                                                </td>

                                                <style>
                                                    .description {
                                                        max-height: 75px;
                                                        /* Hauteur maximale initiale de la description */
                                                        overflow: hidden;
                                                    }
                                                </style>
                                                <script>
                                                    function toggleDescription(rowId) {
                                                        var description = document.getElementById('description-' + rowId);
                                                        var button = description.nextElementSibling;

                                                        if (description.classList.contains('description-complete')) {
                                                            // Réduire la description
                                                            description.classList.remove('description-complete');
                                                            description.style.maxHeight = '10px';
                                                            button.innerText = 'Voir plus';
                                                        }
                                                    }
                                                </script>
                                                <td>
                                                    <a href=" update_livre.php?idup=<?php echo ($row['id']);  ?>"><img src="../images/cosmetics.png" alt="update"></a>
                                                    <a href="delete_livre.php?idi=<?php echo ($row['id']);  ?>" data-toggle="modal" data-target="#logoutModal"><img src="../images/delete.png" alt="delete"></a>

                                                </td>
                                                </td>
                                            </tr>
                                        <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ES-Library 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Delete Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Attention !</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure .. you want to delete this book ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-success" href="delete_livre.php?idi=<?php echo ($row['id']);  ?>">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
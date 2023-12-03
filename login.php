<?php
session_start();
ob_start();
require_once "config/config.php";
require_once "class/fn_admin.php";
require_once "class/fn_membre.php";
//creation de l'objet de connexion
$config_base = new config();
$bd = $config_base->getConnexion();

$Message = '';
$alertClass = '';
if (isset($_POST['connect'])) {
    if (isset($_POST['username']) && isset(($_POST['password']))) {
        if (
            isset($_POST['username']) && isset(($_POST['password']))
        ) {
            $login = htmlspecialchars($_POST["username"]);
            $pass = htmlspecialchars($_POST["password"]);
            $mdp = md5($pass);
            //$mdp = password_hash($pass, PASSWORD_DEFAULT);

            $sql = "select * from membre where login = '$login' and password = '$mdp' ";
            $result = mysqli_query($bd, $sql);

            $sql1 = "select * from admin where login = '$login' and password = '$pass' ";
            $result1 = mysqli_query($bd, $sql1);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                $Message = 'Sign in successful ....';
                $alertClass = 'alert-success';
                $_SESSION['user_id'] = $row['id'];
                header("Refresh:1; url=membre_pages/Espace_membre.php");
            } else if (mysqli_num_rows($result1) == 1) {
                $row = mysqli_fetch_assoc($result1);
                //var_dump($row);
                //if ($pass == $pass) {
                $_SESSION['user_id_ad'] = $row['id'];
                header("Refresh:2; url=admin_pages/dashboard_ad.php");
                $Message = 'Sign in successful....';
                $alertClass = 'alert-success';
            } else {
                $Message = 'Email or Password Failed ....';
                $alertClass = 'alert-danger';
            }
        } else {
            $Message = null;
            $alertClass = null;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="images/livre1.png">

    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="bootstrap.css" type="text/css">

    <!--<link rel="stylesheet" href="style.css" type="text/css">-->
    <title>ES-Library</title>
</head>

<body style="font-family: ' Open Sans', sans-serif; color: #444444;">


    <section class="h-screen" id="height">

        <div class="container px-6 py-12 h-full">

            <div class="flex justify-center items-center flex-wrap h-full g-6 text-gray-800">

                <!--<div class="md:w-8/12 lg:w-6/12 mb-12 md:mb-0">
  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="w-full"
    alt="Phone image" />
</div>-->

                <div class="flex items-center my-4 before:flex-1 before:border-t before:border-gray-300 before:mt-0.5 after:flex-1 after:border-t after:border-gray-300 after:mt-0.5">
                </div>
                <div class="md:w-8/12 lg:w-5/12 lg:ml-20">
                    <form method="POST" class="p-10 bg-white rounded-xl drop-shadow-lg space-y-5" action="">

                        <!-- Email input -->
                        <div class="img">
                            <img src="images/livre1.png" class="w-full" alt="Book image" />
                        </div>
                        <h2 class="mb-4 text-2xl font-extrabold text-gray-800 "><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400 ">L</span>ogin to your Account</h2>


                        <?php if ($Message != null) : ?>
                            <div class="alert alert-dismissible <?php echo $alertClass ?> ">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong><?php echo $Message ?></strong>
                            </div>
                        <?php endif; ?>

                        <!-- Input de saisir du Utilisateur-->
                        <div class="relative h-10 w-full min-w-[200px]" id="gray">
                            <input type="email" name="username" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-teal-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required />
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-teal-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-teal-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-teal-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Email
                            </label>
                        </div>
                        <!-- Input de saisir du Mot de passe-->
                        <div class="relative h-10 w-full min-w-[200px]" id="gray">
                            <input type="password" name="password" class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-teal-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50" placeholder=" " required />
                            <!-- il faut mettre ([Placeholder]=" " pour que le mot de passe soit dans l'input et pas au dessus)-->
                            <label class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-teal-500 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-teal-500 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-teal-500 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                                Password
                            </label>
                        </div>


                        <div id="center">
                            <button type="reset" class="inline-block px-6 py-2.5 bg-gray-200 text-gray-700 font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-gray-300 hover:shadow-lg focus:bg-gray-300 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-400 active:shadow-lg transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                &nbsp;Cancel&nbsp;
                            </button> &nbsp; &nbsp;
                            <!-- Submit button -->
                            <button name="connect" type="submit" class="inline-block px-6 py-2.5 bg-green-500 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-green-600 hover:shadow-lg focus:bg-green-600 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-700 active:shadow-lg transition duration-150 ease-in-out fas fa-sign-out-alt" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                &nbsp; Login &nbsp;
                            </button>

                        </div>
                        <hr>

                        <p><span>Don't have an account?</span> <a href="register.php" class="rouge">Register</a></p>
                        <!--<p class="text-right"><a class="text-blue-600 text-sm font-light hover:underline " href="##">
                                Mot de passe oublié ?</a></p>-->


                    </form>

                </div>
            </div>
        </div>


    </section>
</body>

</html>
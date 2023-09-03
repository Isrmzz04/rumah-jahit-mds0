<?php
session_start();
require '../koneksi.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2 class="text-[#222] font-bold text-4xl">LOGIN</h2>
            </div>
        </div>
        <div class="row mt-[2rem]">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Login sebagai admin </strong>
                    </div>
                    <div class="panel-body mb-10 mt-5">
                        <form role="form" method="post">
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="ketikan username kamu " />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password"
                                    placeholder="ketikan password kamu" />
                            </div>

                            <div class="flex justify-end mb-10">
                                <button class="btn btn-primary" name="login">LOGIN</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['login'])) {
                            $ambil = $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok == 1) {
                                $_SESSION['admin'] = $ambil->fetch_assoc();
                                echo "<div class='alert alert-info'>LOGIN BERHASIL</div>";
                                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                            } else {
                                echo "<div class='alert alert-danger'>LOGIN GAGAL</div>";
                                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                            }
                        }
                        ?>
                    </div>

                </div>
            </div>


        </div>
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>

</html>
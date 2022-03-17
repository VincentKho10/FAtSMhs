<?php
require './vendor/autoload.php';

$act = filter_input(1, "act");
$client = new MongoDB\Client('mongodb://Vincent:google.com@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

?>
<!DOCTYPE html>
<html>

    <head>
        <title>
            <?php
            if ($act == "login") {
                echo "login";
            } else if ($act == "register") {
                echo "register";
            }
            ?>
        </title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="src/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="src/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>

    <body class="sidebar-mini layout-boxed sidebar-collapse" style="height: auto;">
        <?php
        if ($act == "printing") {
            require_once("api/printing/index.php");
        } else if ($act == "login") {
            require_once("api/login/index.php");
        } else if ($act == "register") {
            require_once("api/register/index.php");
        } else if ($act == "admin") {
        } else {
            require_once("src/index.php");
        }
        ?>
        <!-- jQuery -->
        <script src="src/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="src/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="src/dist/js/demo.js"></script>
        
        <script src="src/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="src/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="src/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="src/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="src/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="src/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="src/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="src/plugins/jszip/jszip.min.js"></script>
        <script src="src/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="src/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="src/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="src/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="src/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- AdminLTE App -->
        <script src="src/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="src/dist/js/demo.js"></script>
        <!-- Page specific script -->
    </body>
</html>
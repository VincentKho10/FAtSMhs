<?php
require './vendor/autoload.php';
require './src/repository/user_reposiory.php';
require './src/repository/mhs_repository.php';

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
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body class="sidebar-mini layout-boxed sidebar-collapse" style="height: auto;">
    
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!--datatables-->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

        <?php
        if ($act == "printing") {
            require_once("api/printing/index.php");
        } else if ($act == "login") {
            header('Content-type: application/json');
            require_once("api/login/index.php");
        } else if ($act == "register") {
            header('Content-type: application/json');
            require_once("api/register/index.php");
        } else {
            require_once("src/index.php");
        }
        ?>
    </body>
</html>
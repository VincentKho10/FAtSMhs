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
</head>

<body>
    <?php
    if ($act == "printing") {
        require_once("api/printing/index.php");
    } else if ($act == "login") {
        var_dump($act);
        require_once("api/login/index.php");
    } else if ($act == "register") {
        var_dump($act);
        require_once("api/register/index.php");
    } 
    ?>

</body>

</html>
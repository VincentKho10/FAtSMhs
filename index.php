<?php
require 'vendor/autoload.php';

try {
$act = filter_input(1, "act");
$client = new MongoDB\Client('mongodb://Vincent:Tu70r14l@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

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
    if ($act == "login") {
        include_once('api\login\index.php');
    } else if ($act == "register") {
        include_once('api\registrasi\index.php');
    }
} catch (\Exception $e) {
    throw $e;
    var_dump($e);
    echo $e;
}
    ?>

</body>

</html>
<?php
require './vendor/autoload.php';
require './src/repository/user_reposiory.php';
require './src/repository/mhs_repository.php';

$act = filter_input(1, "act");
$client = new MongoDB\Client('mongodb://Vincent:google.com@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

if ($act == "printing") {
    require_once("api/printing/index.php");
} else if ($act == "login") {
    require_once("api/login/index.php");
} else if ($act == "register") {
    require_once("api/register/index.php");
}
?>
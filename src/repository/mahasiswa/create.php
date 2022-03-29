<?php
require "../mhs_repository.php";
$client = new MongoDB\Client('mongodb://Vincent:google.com@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

$mhrep = new MahasiswaRepository($client);
$mhrep->funcCreate();
?>
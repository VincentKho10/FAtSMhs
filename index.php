<?php
    include 'vendor/autoload.php';
    $act = filter_input(1,"act");
    if($act == "login"){
        require_once('api\login\index.php');
    }
    else if($act == 'register'){
        require_once('api\registrasi\index.php');
    }
?>
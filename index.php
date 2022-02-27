<?php
require 'vendor/autoload.php';
require 'api/login/index.php';
require 'api/registrasi/index.php';
?>
<!DOCTYPE html>
<html>
    <?php
        $act = filter_input(1, "act");
        if ($act == "login") {
            include_once('api\login\index.php');
        } else if ($act == 'register') {
            include_once('api\registrasi\index.php');
        }
    ?>
</html>
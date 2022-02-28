<?php
require 'vendor/autoload.php';
require 'api/login/index.php';
require 'api/registrasi/index.php';

$act = filter_input(1, "act");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php
                if ($act == "login") {
                    echo "login";
                } else if ($act == 'register') {
                    echo "register";
                }
            ?>
        </title>
    </head>
    <body>
        <?php
            if ($act == "login") {
                include_once('api\login\index.php');
            } else if ($act == 'register') {
                include_once('api\registrasi\index.php');
            }
        ?>
        
    </body>
</html>
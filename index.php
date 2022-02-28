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

        $macaddr = filter_input(1, "macaddr");
        if ($macaddr != null) {
            var_dump($macaddr);
            $client = new MongoDB\Client(
                $uri='mongodb+srv://Vincent:Tu70r14l@cluster0.zfifs.mongodb.net/fatsdb?retryWrites=true&w=majority'
            );
            var_dump($macaddr + "test");

            $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
            $result_mahasiswa = $collection_mahasiswa->find(['mac_address' => $macaddr]);

            echo $result_mahasiswa;
        }
    } else if ($act == 'register') {
        include_once('api\registrasi\index.php');
    }
    ?>

</body>

</html>
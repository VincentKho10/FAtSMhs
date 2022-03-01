<?php
require 'vendor/autoload.php';

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
        try{
            $macaddr = filter_input(1, "macaddr");
            if ($macaddr != null) {
                $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
                $result_mahasiswa = $collection_mahasiswa->find(['mac_address'=> $macaddr])->toArray();
                if(count($result_mahasiswa)==1){
                    echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result_mahasiswa[0]));
                }else{
                    echo "{}";
                }
            }
            echo "{}";
        } catch (\Exception $e) {
            echo "{}";
        }
    } else if ($act == "register") {
        try{
            $nrp = filter_input(1,"nrp");
            $pass = filter_input(1,"pass");
            $macaddr = filter_input(1,"mac");
        
            if ($nrp != null && $pass != null && $macaddr != null) {
                $collection_mahasiswa = $client->fatsdb->mahasiswa;
                $result_mahasiswa = $collection_mahasiswa->find(['nrp' => $nrp, 'password' => $pass]);
                $collection_mahasiswa_user = $client->fatsdb->mahasiswa_user;
                $result_mahasiswa_user = $collection_mahasiswa->insertOne(['mahasiswa' => $result_mahasiswa, "mac_address" => $macaddr]);
                
                echo "{\"success\":true}";
            }
            echo "{\"success\":false}";
        
        } catch (\Exception $e) {
            echo "{\"success\":false}";
        }
    }
    ?>

</body>

</html>
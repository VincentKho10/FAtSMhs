<?php
$client = new MongoDB\Client('mongodb://Vincent:Tu70r14l@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

try{
    $nrp = filter_input(1,"nrp");
    $pass = filter_input(1,"pass");
    $macaddr = filter_input(1,"mac");

    if ($nrp != null && $pass != null && $macaddr != null) {
        $collection_mahasiswa = $client->fatsdb->mahasiswa;
        $result_mahasiswa = $collection_mahasiswa->find(['nrp' => $nrp, 'password' => $pass]);
        $collection_mahasiswa_user = $client->fatsdb->mahasiswa_user;
        $result_mahasiswa_user = $collection_mahasiswa->insertOne(['mahasiswa' => $result_mahasiswa, "mac_address" => $macaddr]);

        echo $result_mahasiswa_user;
    }

} catch (\Exception $e) {
    throw $e;
    var_dump($e);
    echo $e;
}
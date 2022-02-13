<?php
require 'vendor/autoload.php';

$nrp = filter_input(1, "nrp");
$pass = filter_input(1, "pass");
$macaddr = filter_input(1, "mac");

if ($nrp != null && $pass != null && $macaddr != null) {
    $client = new MongoDB\Client(
        'mongodb+srv://Vincent:Tu70r14l@cluster0.zfifs.mongodb.net/fatsdb?retryWrites=true&w=majority'
    );

    $collection_mahasiswa = $client->fatsdb->mahasiswa;
    $result_mahasiswa = $collection_mahasiswa->find(['nrp' => $nrp, 'password' => $pass]);
    $collection_mahasiswa_user = $client->fatsdb->mahasiswa_user;
    $result_mahasiswa_user = $collection_mahasiswa->insertOne(['mahasiswa' => $result_mahasiswa, "mac_address" => $macaddr]);

    echo $result_mahasiswa_user;
}

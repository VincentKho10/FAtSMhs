<?php
require 'vendor/autoload.php';

$macaddr = filter_input(1, "macaddr");

if ($macaddr != null) {
    $client = new MongoDB\Client(
        'mongodb+srv://Vincent:Tu70r14l@cluster0.zfifs.mongodb.net/fatsdb?retryWrites=true&w=majority'
    );

    $collection_mahasiswa = $client->fatsdb->mahasiswa;
    $result_mahasiswa = $collection_mahasiswa->find(['mac_address' => $macaddr]);

    echo $result_mahasiswa;
}

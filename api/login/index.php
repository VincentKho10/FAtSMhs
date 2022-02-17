<?php

$macaddr = filter_input(1,"macaddr");

if ($macaddr != null) {
    $client = new MongoDB\Client(
        'mongodb+srv://Vincent:Tu70r14l@cluster0.zfifs.mongodb.net/fatsdb?retryWrites=true&w=majority'
    );

    $collection_mahasiswa = $client->fatsdb->mahasiswa;
    $result_mahasiswa = $collection_mahasiswa->findOne(['mac_address' => $macaddr]);

    var_dump($result_mahasiswa);
}
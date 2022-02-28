<?php

$macaddr = filter_input(1, "macaddr");
if ($macaddr != null) {
    var_dump($macaddr);
    $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
    $result_mahasiswa = $collection_mahasiswa->find(['mac_address'=> $macaddr]);
    var_dump($result_mahasiswa);
    echo $result_mahasiswa;
}
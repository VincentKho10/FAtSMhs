<?php

$macaddr = filter_input(1, "macaddr");
if ($macaddr != null) {
    $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
    $result_mahasiswa = $collection_mahasiswa->find(['mac_address'=> $macaddr]);
    echo $result_mahasiswa;
}
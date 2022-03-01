<?php
try{
$macaddr = filter_input(1, "macaddr");
    if ($macaddr != null) {
        var_dump($macaddr);
        $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
        $result_mahasiswa = $collection_mahasiswa->find(['mac_address'=> $macaddr])->toArray();
        echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result_mahasiswa[0]));
    }
} catch (\Exception $e) {
    throw $e;
    var_dump($e);
    echo $e;
}
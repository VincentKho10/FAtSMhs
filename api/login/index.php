<?php
$client = new MongoDB\Client('mongodb://Vincent:Tu70r14l@cluster0-shard-00-00.zfifs.mongodb.net:27017,cluster0-shard-00-01.zfifs.mongodb.net:27017,cluster0-shard-00-02.zfifs.mongodb.net:27017/myFirstDatabase?ssl=true&replicaSet=atlas-quesel-shard-0&authSource=admin&retryWrites=true&w=majority');

try{
    $macaddr = filter_input(1, "macaddr");
    if ($macaddr != null) {
        var_dump($macaddr);
        $collection_mahasiswa = $client->fatsdb->mahasiswa_user;
        $result_mahasiswa = $collection_mahasiswa->find(['mac_address'=> $macaddr])->toArray();
        if(count($result_mahasiswa)==1){
            echo MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result_mahasiswa[0]));
        }else{
            echo "{}";
        }
    }
} catch (\Exception $e) {
    throw $e;
    var_dump($e);
    echo $e;
}
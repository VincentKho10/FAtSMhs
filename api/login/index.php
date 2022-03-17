<?php
echo '<body>';
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
} catch (\Exception $e) {
    echo "{}";
}
echo '</body>';
?>
<?php
try{
    $nrp = filter_input(1,"nrp");
    $pass = filter_input(1,"pass");
    $macaddr = filter_input(1,"mac");

    if ($nrp != null && $pass != null && $macaddr != null) {
        $collection_mahasiswa = $client->fatsdb->mahasiswa;
        $result_mahasiswa = $collection_mahasiswa->find(['nrp' => $nrp, 'password' => $pass])->toArray()[0];
		if($result_mahasiswa != null){
            $collection_mahasiswa_user = $client->fatsdb->mahasiswa_user;
            $resinjson =  MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result_mahasiswa));
            $result_mahasiswa_user = $collection_mahasiswa_user->insertOne({"mahasiswa" => json_decode('.$resinjson.'), "mac_address" => '.$macaddr.'});
        }else{
            echo "{\"success\":false,\"message\":\"mahasiswa result is null\"}";
        }
    }else{
        echo "{\"success\":false,\"message\":\"there are nrp or pass are empty\"}";
    }

} catch (\Exception $e) {
    echo "{\"success\":false,\"message\":\"".$e."\"}";
}
?>
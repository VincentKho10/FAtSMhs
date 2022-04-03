<?php
try{
    $nrp = filter_input(1,"nrp");
    $pass = filter_input(1,"pass");
    $macaddr = filter_input(1,"mac");

    if ($nrp != null && $pass != null && $macaddr != null) {
        $collection_mahasiswa = $client->fatsdb->mahasiswa;
        $result_mahasiswa = $collection_mahasiswa->find(['nrp' => $nrp, 'password' => $pass]);
		if($result_mahasiswa != null){
            $collection_mahasiswa_user = $client->fatsdb->mahasiswa_user;
            $result_mahasiswa_user = $collection_mahasiswa->insertOne(['mahasiswa' => $result_mahasiswa, "mac_address" => $macaddr]);
        }
    }else{
        echo "{}";
    }

} catch (\Exception $e) {
    echo "{\"success\":false}";
}
?>
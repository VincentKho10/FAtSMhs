<?php
class UserRepository{
    static public $userRepoHead = [];
    static public $userRepoBody = [];
    static public $count;
    private $client;
    private $collection_user;
    
    function __construct($client){
        $this->client = $client;
        $this->collection_user = $this->client->fatsdb->mahasiswa_user;
        $this->getAll();
    }

    function getOne($oid){
        try{
            $result_user = $this->collection_user->findOne(['_id' => $oid]);
            return json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($$result_user)),true);
        } catch (\Exception $e) {
            echo "{}";
        }
    }

    function getAll(){
        try{
            $result_user = $this->collection_user->find()->toArray();
            self::$count = count($result_user);
            //jika kosong
            if(self::$count>0){
                //foreach seluruh hasil
                foreach($result_user as $reus){
                    $resinjson = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($reus)),true);
                    $tempbod = [];
                    //tampilkan jika pengguna masih aktif
                    // if(!$resinjson["mahasiswa"]["active"]){
                        foreach($resinjson as $key => $value){
                            // echo "\n";
                            if($key!="_id"&&$key!="presence"){
                                if(count(self::$userRepoHead)<2){
                                    array_push(self::$userRepoHead,$key);
                                }
                                switch ($key) {
                                    case 'mahasiswa':
                                        array_push($tempbod,strval($value["nrp"]." - ".$value["nama"]));
                                        break;
                                    default:
                                        array_push($tempbod,strval($value));
                                        break;
                                }
                            }
                            // array_push($tempbod,strval($value));
                            // foreach ($value as $value1) {
                            // }
                        }
                    // }
                    array_push(self::$userRepoBody,$tempbod);
                }
            }else{
                self::$userRepoBody=[];
                self::$userRepoHead=[];
            }
        } catch (\Exception $e) {
            echo "{}";
        }
    }

    /*[
    {
        "_id":
        "mahasiswa":
        "mac_address":
    },
    {
        "_id":
        "mahasiswa":
        "mac_address":
    }
    ]*/
    function funcCreate($user){
        $arr=[];
        foreach ($user as $value) {
            $temparr=[];
            foreach ($user as $key1 => $value1) {
                if($key1 == "mahasiswa"){
                    $temparr1=[];
                    foreach ($value1 as $key2 => $value2) {
                        array_merge($temparr1,[$key2 => $value2]);
                    }
                    array_merge($temparr,["mahasiswa"=>$temparr1]);
                }else{
                    array_merge($temparr,[$key1 => $value1]);
                }
            }
            array_push($arr,$temparr);
        }
        try{
            $resultInsertMany = $this->collection_user->insertMany($arr);
            printf("Inserted %d document(s)\n", $resultInsertMany->getInsertedCount());
            var_dump($resultInsertMany->getInsertedIds());
        } catch (\Exception $e) {
            echo "{}";
        }
    }

    /*{
        "_id":
        "mahasiswa":
        "mac_address":
    }*/
    function funcUpdate($tochguser,$changeuser){
        $arr=[];
        foreach ($tochguser as $key => $value) {
            if($key == "mahasiswa"){
                $temparr1=[];
                foreach ($value as $key1 => $value1) {
                    array_merge($temparr1,[$key1 => $value1]);
                }
                array_merge($arr,["mahasiswa" => $temparr1]);
            }else{
                array_merge($arr,[$key => $value]);
            } 
        }
        $arr1=[];
        $temparr=[];
        foreach ($changeuser as $key => $value) {
            if($key == "mahasiswa"){
                $temparr1=[];
                foreach ($value as $key1 => $value1) {
                    array_merge($temparr1,[$key1 => $value1]);
                }
                array_merge($temparr,["mahasiswa" => $temparr1]);
            }else{
                array_merge($temparr,[$key => $value]);
            } 
        }
        array_merge($arr1,['$set'=>$temparr]);
        try{
            $resultInsertMany = $this->collection_user->updateOne($arr);
            printf("Inserted %d document(s)\n", $resultInsertMany->getInsertedCount());
            var_dump($resultInsertMany->getInsertedIds());
        } catch (\Exception $e) {
            echo "{}";
        }
    }
}
?>
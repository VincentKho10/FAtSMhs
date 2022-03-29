<?php
class MahasiswaRepository{
    static public $mhsRepoHead = [];
    static public $mhsRepoBody = [];
    static public $count;
    private $client;
    private $collection_mhs;
    
    function __construct($client){
        $this->client = $client;
        $this->collection_mhs = $this->client->fatsdb->mahasiswa;
        $this->getAll();
    }

    function getOne($oid){
        try{
            $result_mhs = $this->collection_mhs->findOne(['_id' => $oid]);
            return json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($$result_mhs)),true);
        } catch (\Exception $e) {
            echo "{}";
        }
    }

    function getAll(){
        try{
            $result_mhs = $this->collection_mhs->find()->toArray();
            self::$count = count($result_mhs);
            //jika kosong
            if(self::$count>0){
                //foreach seluruh hasil
                foreach($result_mhs as $reus){
                    $resinjson = json_decode(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($reus)),true);
                    $tempbod = [];
                    //tampilkan jika pengguna masih aktif
                    // if(!$resinjson["mahasiswa"]["active"]){
                        foreach($resinjson as $key => $value){
                            // echo "\n";
                            if($key!="_id"&&$key!="presence"){
                                if(count(self::$mhsRepoHead)<4){
                                    array_push(self::$mhsRepoHead,$key);
                                }
                                array_push($tempbod,strval($value));
                            }
                            // array_push($tempbod,strval($value));
                            // foreach ($value as $value1) {
                            // }
                        }
                    // }
                    array_push(self::$mhsRepoBody,$tempbod);
                }
            }else{
                self::$mhsRepoBody=[];
                self::$mhsRepoHead=[];
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
    function funcCreate($mhs){
        $arr=[];
        foreach ($mhs as $value) {
            $temparr=[];
            foreach ($mhs as $key1 => $value1) {
                array_merge($temparr,[$key1 => $value1]);
            }
            array_push($arr,$temparr);
        }
        try{
            $resultInsertMany = $this->collection_mhs->insertMany($arr);
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
    function funcUpdate($tochgmhs,$changemhs){
        $arr=[];
        foreach ($tochgmhs as $key => $value) {
            array_merge($arr,[$key => $value]);
        }
        $arr1=[];
        $temparr=[];
        foreach ($changemhs as $key => $value) {
            array_merge($temparr,[$key => $value]);
        }
        array_merge($arr1,['$set'=>$temparr]);
        try{
            $resultInsertMany = $this->collection_mhs->updateOne($arr,$arr1);
            printf("Inserted %d document(s)\n", $resultInsertMany->getInsertedCount());
            var_dump($resultInsertMany->getInsertedIds());
        } catch (\Exception $e) {
            echo "{}";
        }
    }
}
?>
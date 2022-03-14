<?php
    $input = filter_input(1,"jadwal_id");
    if($input != null){
        $collection_kehadiran = $client->fatsdb->kehadiran;
        $result_kehadiran = $collection_kehadiran->find( [ 'jadwal._id' => new MongoDB\BSON\ObjectId("$input") ] )->toArray();

        $collection_jadwal = $client->fatsdb->jadwal;
        $result_jadwal = $collection_jadwal->find( [ '_id' => new MongoDB\BSON\ObjectId("$input") ] )->toArray();
        
        $jadwal = $result_jadwal[0];

        // var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($result_jadwal)));

        echo '<h2 class="layout">DAFTAR HADIR MAHASISWA UNIVERSITAS KRISTEN MARANATHA</h1>';
        echo '<div class="details layout">';
        echo '<div class="rodesc">';
        echo '<div class="desc left">';
        echo '<div class=\'nama\'>Program Studi</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["program_studi"].'</div></div>';
        echo '<div class="desc right">';
        echo '<div class=\'nama\'>Mata Kuliah</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["mata_kuliah"].'</div></div>';
        echo '</div>';
        echo '<div class="rodesc">';
        echo '<div class="desc left">';
        echo '<div class=\'nama\'>Kelas</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["kelas"].'</div></div>';
        echo '<div class="desc right">';
        echo '<div class=\'nama\'>Semester</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["semester"].'</div></div>';
        echo '</div>';
        echo '<div class="rodesc">';
        echo '<div class="desc left">';
        echo '<div class=\'nama\'>Kode MK</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["kode_mk"].'</div></div>';
        echo '<div class="desc right">';
        echo '<div class=\'nama\'>Ruangan</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["ruang"].'</div></div>';
        echo '</div>';
        echo '<div class="rodesc">';
        echo '<div class="desc left">';
        echo '<div class=\'nama\'>Waktu</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["waktu"].'</div></div>';
        echo '<div class="desc right">';
        echo '<div class=\'nama\'>Dosen</div><div class=\'titikdua\'>:</div><div class=\'info\'>'.$jadwal["dosen"]["nama"].'</div></div>';
        echo '</div>';
        echo '</div>';
        echo '<table>';
        echo '<tr>';
        echo '<th>No.</th>';
        echo '<th>Nama Lengkap</th>';

                    for ($i=0; $i < count($result_kehadiran); $i++) { 
                        echo "<th style='width:85px;'>".$result_kehadiran[$i]["date"]."</th>";
                    }
                    
                    for ($i=count($result_kehadiran)+1; $i <= 12; $i++) { 
                        // echo "<th>".$result_kehadiran[0]["date"]."</th>";
                        echo "<th style='width:85px;'>$i</th>";
                    }
                    echo '</tr>';
                    echo '<tr>';
                            // $mahasiswas = $result_kehadiran[$i]["jadwal"]["mahasiswas"];
                        // for ($i=0; $i < count($result_kehadiran); $i++) { 
                        //     array_push($mahasiswas,);
                        //     var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($mahasiswas)));
                        // }
                        // var_dump(MongoDB\BSON\toJSON(MongoDB\BSON\fromPHP($mahasiswas)));
                            // for ($i=1; $i <= 12; $i++) {
                        $index=0; 
                        foreach($result_jadwal[0]["mahasiswas"] as $peserta_jadwal){
                            $index++;
                            echo "<tr>";
                            echo "<td>$index</td>";
                            echo "<td style='width:211px;'>".$peserta_jadwal["nama"]."</td>";
                            for ($i=0; $i < count($result_kehadiran); $i++) { 
                                $mahasiswas = $result_kehadiran[$i]["jadwal"]["mahasiswas"];
                                echo "<td>";
                                $sho="H";
                                if($mahasiswas[$index-1]["logged"]==false){
                                    $sho="A";
                                }
                                echo $sho;
                                echo "</td>";
                            }
                            for ($j=count($result_kehadiran)+1; $j <= 12; $j++) { 
                                echo "<td>";
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        for ($j=count($result_jadwal[0]["mahasiswas"]); $j < 25; $j++) { 
                            $index++;
                            echo "<tr>";
                            echo "<td>$index</td>";
                            for ($k=0; $k <= 12; $k++) { 
                                echo "<td>";
                                echo "</td>";
                            }
                            echo "</tr>";
                        }
                        echo '</tr>';
echo '</table>';
}
            
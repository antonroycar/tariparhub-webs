<?php

// LINK: http://raspberrypi.local/Sensor/kirimdata.php?Suhu=18.5&Kelembaban=41.5&pH=5.3&Nitrogen=112&Kalium=245&Phosphorus=123&Konduktivitas_Listrik=2133

// ESP just trying to PING
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    http_response_code(200);
    exit();
}


$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "";
$DBNAME = "grafiksensor";

$ID_COLNAME = "Sensor_ID";
$TEMP_COLNAME = "Suhu";
$HUM_COLNAME = "Kelembaban";
$PH_COLNAME = "pH";
$N_COLNAME = "Nitrogen";
$P_COLNAME = "Phosphorus";
$K_COLNAME = "Kalium";
$EC_COLNAME = "Konduktivitas_Listrik";
$TIMESTAMP_COLNAME = "Tanggal";


//Koneksi ke Database
$koneksi = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DBNAME);

// Function to sanitize input and handle missing parameters
function get_data()
{
    return json_decode(file_get_contents('php://input'));
}

// Tangkap Parameter yang Dikirimkan oleh NodeMCU
$sensor = get_data();
$sensorID = $sensor->ID;
$sensorData = $sensor->data;
if($sensorID == 1){
$TABLENAME = "tb_sensor1";
    } else if ($sensorID == 2) {
$TABLENAME = "tb_sensor2";    
    }
else if ($sensorID == 3) {
    $TABLENAME = "tb_sensor3";    
    }
else if ($sensorID == 4) {
    $TABLENAME = "tb_sensor4";    
    }
else if ($sensorID == 5) {
    $TABLENAME = "tb_sensor5";    
    }
else if ($sensorID == 6) {
    $TABLENAME = "tb_sensor6";    
    }
else if ($sensorID == 7) {
    $TABLENAME = "tb_sensor7";    
    }
else if ($sensorID == 8) {
    $TABLENAME = "tb_sensor8";    
    }
else if ($sensorID == 9) {
    $TABLENAME = "tb_sensor9";    
    }

for ($i = 0; $i < count($sensorData); $i++) {
    $timestamp = strval($sensorData[$i]->timestamp);
    $Nitrogen = strval($sensorData[$i]->N);
    $Phosphorus = strval($sensorData[$i]->P);
    $Kalium = strval($sensorData[$i]->K);
    $pH = strval($sensorData[$i]->pH);
    $Suhu = strval($sensorData[$i]->temp);
    $Kelembaban = strval($sensorData[$i]->hum);
    $Konduktivitas_Listrik = strval($sensorData[$i]->EC);

    // Simpan ke Tabel tb_sensor
    $query = "INSERT INTO " . $TABLENAME .
                ' (' . $ID_COLNAME .
                ', ' . $TEMP_COLNAME . 
                ', ' . $HUM_COLNAME . 
                ', ' . $PH_COLNAME . 
                ', ' . $N_COLNAME . 
                ', ' . $K_COLNAME . 
                ', ' . $P_COLNAME . 
                ', ' . $EC_COLNAME .
                // ', ' . $TIMESTAMP_COLNAME .
                ') '.
            " VALUES " . 
                '("' . $sensorID . 
                '", "' . $Suhu .
                '", "' . $Kelembaban .
                '", "' . $pH .
                '", "' . $Nitrogen . 
                '", "' . $Kalium .
                '", "' . $Phosphorus .
                '", "' . $Konduktivitas_Listrik .
                // '", "' . $timestamp .
                '")';
                
    // Simpan Nilai Suhu dan Kelembaban ke Tabel tb_sensor
    $Simpan = mysqli_query($koneksi, $query);

    // Berikan Respon 500 ke NodeMCU apabila satu saja tidak berhasil
    if (!$Simpan) {
        http_response_code(500);
        mysqli_close($koneksi);
        exit();
    }
}

// Berikan Respon ke NodeMCU
http_response_code(200);

// Koneksi ditutup
mysqli_close($koneksi);

?>
<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "adventureworksdw";    

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$connection){
    echo "Koneksi Gagal! : ". mysqli_connect_error();
}

?>
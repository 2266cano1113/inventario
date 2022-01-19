<?php
    // session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "inventarioclinica";
    $port = "3306";
    $conn = mysqli_connect($servername, $username, $password, $database, $port);
    if (!$conn) {
        die("Conexion no establecida: ". mysqli_connect_error());
    }
?>
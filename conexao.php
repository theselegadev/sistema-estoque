<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "estoque";

    $conn = mysqli_connect($host,$user,$password) or die ("Não foi possível conectar!");
    mysqli_select_db($conn,$db_name);
?>
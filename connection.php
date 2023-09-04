<?php
    // Connection to DB
    $address = "localhost";
    $user = "root";
    $password = "";
    $dbname = "dom_of_music";

    $connect = mysqli_connect($address,$user,$password, $dbname);

    // if ($connect = mysqli_connect($address,$user,$password, $dbname)) {
    //     print "Conexão realizada com sucesso!";
    // }
?>
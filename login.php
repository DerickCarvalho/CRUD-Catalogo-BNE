<?php
    include("connection.php");

    $adm_user = $_REQUEST['username'];
    $adm_pass = base64_encode($_REQUEST['password']);

    $loginQuery = "SELECT * FROM adm_info WHERE nick='$adm_user' AND pass='$adm_pass'";
    $searchAdm = $connect->query($loginQuery);
    $resSearch = $searchAdm->num_rows;
    $showInfos = $searchAdm->fetch_object();
    $usuId = base64_encode($showInfos->id);

    if ($resSearch != 0) {
        sleep(1);
        print "<script>location.href = './adm-page.php?id=$usuId&page=home';</script>";
    } else {
        print "<script>alert('Usuário não encontrado na base de dados!');";
        print "location.href = './login-adm.html';</script>";
    }
?>
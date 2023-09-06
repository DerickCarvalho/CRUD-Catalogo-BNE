<?php
    include("connection.php");
    
    $confirmation = $_REQUEST['confirm'];
    $delId = $_REQUEST['delid'];
    $admId = base64_encode($_REQUEST['id']); 

    sleep(1);
    
    if($confirmation != false) {
        $deleteQuery = "DELETE FROM adm_info WHERE id=$delId";    

        try {
            $executeDelete = $connect->query($deleteQuery);
            $idDec = base64_decode($admId);
            print "<script>alert('ADM Removido com Sucesso!'); location.href='./adm-page.php?id=$idDec&page=view-adms'</script>";
        } catch (\Throwable $th) {
            print "<script>alert('Erro ao remover ADM!'); location.href='./adm-page.php?id=$admId&page=view-adms'</script>";
        }
    } else {
        print "<script>";
        print "let confirmation = confirm('Deseja realmente excluir este ADM?');";
        print "if(confirmation == false) {location.href='./adm-page.php?id=$admId&page=view-adms'}";
        print "else {location.href='./delet-adm.php?confirm='+confirmation+'&id=$admId&delid=$delId'}";
        print "</script>";  
    }
?>
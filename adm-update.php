<?php
    include("connection.php");

    $action = $_REQUEST['action'];

    if ($action == 'update') {
        $usuId = $_REQUEST['id'];
        $usuIdEnc = base64_encode($usuId);
        $queryBackup = "SELECT * FROM adm_info WHERE id=$usuId";
        $exeQueryBackup = $connect->query($queryBackup);
        $backupData = $exeQueryBackup->fetch_object();

        $newName = $_REQUEST['name']; if($newName == null) $newName = $backupData->usu_name;
        $newNick = $_REQUEST['nick']; if($newNick == null) $newNick = $backupData->nick;
        $newNumber = $_REQUEST['number']; if($newNumber == null) $newNumber = $backupData->cell_number;
        $newProfileImg = $_REQUEST['profile_img']; if($newProfileImg == null) $newProfileImg = $backupData->profile_img;

        //TRATANDO SENHA

        if ($_REQUEST['pass'] == $_REQUEST['confirm_pass']) {
            $newPassword = base64_encode($_REQUEST['pass']); if($newPassword == null) $newPassword = $backupData->pass;

            $updateQuery = "UPDATE adm_info SET 
            usu_name='$newName', nick='$newNick', pass='$newPassword', cell_number='$newNumber', profile_img='$newProfileImg'
            WHERE id=$usuId";

            try {
                if ($_REQUEST['name'] == null && $_REQUEST['nick'] == null && $_REQUEST['number'] == null && $_REQUEST['profile_img'] == null && $_REQUEST['pass'] == null && $_REQUEST['confirm_pass'] == null) {
                    print "<script>alert('Nenhum dado inserido!'); location.href='./adm-page.php?id=$usuIdEnc&page=profile'</script>";
                } else {
                    $exeUpdate = $connect->query($updateQuery);
                    print "<script>alert('Dados atualizados com sucesso!'); location.href='./adm-page.php?id=$usuIdEnc&page=profile'</script>";
                }
            } catch (\Throwable $th) {
                print "<script>";
                print "    window.location.href='./adm-page.php?id=$usuIdEnc&page=profile';";
                print "    alert('Erro ao atualizar dados, tente novamente mais tarde ou entre em contato com o suporte!');";
                print "</script>";
            }


        } else {
            print "<script>";
            print "    window.location.href='./adm-page.php?id=$usuIdEnc&page=profile';";
            print "    alert('Confirmação de senha incorreta!');";
            print "</script>";
        }
    }
    else if ($action == 'add') {
        $usuId = $_REQUEST['id'];
        $usuIdEnc = base64_encode($usuId);
        $usuName = $_REQUEST['name']; 
        $usuNick = $_REQUEST['nick']; 
        $usuNumber = $_REQUEST['number']; 
        $usuProfileImg = $_REQUEST['profile_img']; 
        $usuPassword = base64_encode($_REQUEST['pass']);

        $addQuery = "INSERT INTO adm_info (usu_name, nick, pass, cell_number, profile_img) VALUES
            ('$usuName', '$usuNick', '$usuPassword', '$usuNumber', '$usuProfileImg')";
        
        try {
            $exeAdd = $connect->query($addQuery);
            print "<script>alert('ADM Cadastrado com Sucesso!'); location.href='./adm-page.php?id=$usuIdEnc&page=home'</script>";
        } catch (\Throwable $th) {
            print "<script>";
            print "    window.location.href='./adm-page.php?id=$usuIdEnc&page=home';";
            print "    alert('Erro ao cadastrar adm, tente novamente mais tarde ou entre em contato com o suporte!');";
            print "</script>";
        }
    }
?>
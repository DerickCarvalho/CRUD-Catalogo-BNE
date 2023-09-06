<?php
    include("connection.php");

    $admId = $_REQUEST['id'];
    $sugId = $_REQUEST['sug_id'];
    $local = $_REQUEST['local'];

    sleep(1);

    if ($local == 'all') {
        $markReadSugQuery = "UPDATE sugests SET situation=1 WHERE id=$sugId";

        try {
            $exeMarkRead = $connect->query($markReadSugQuery);
            print "<script>alert('Mensagem marcada como Lida!'); location.href='./adm-page.php?id=$admId&page=all-sugests'</script>";

        } catch (\Throwable $th) {
            print "<script>alert('Erro ao marcar mensagem como lida...'); location.href='./adm-page.php?id=$admId&page=all-sugests'</script>";
        }
    } else {
        $markReadSugQuery = "UPDATE sugests SET situation=1 WHERE id=$sugId";

        try {
            $exeMarkRead = $connect->query($markReadSugQuery);
            print "<script>alert('Mensagem marcada como Lida!'); location.href='./adm-page.php?id=$admId&page=noread'</script>";

        } catch (\Throwable $th) {
            print "<script>alert('Erro ao marcar mensagem como lida...'); location.href='./adm-page.php?id=$admId&page=noread'</script>";
        }

    }
?>
<?php
    if (isset($_POST['submit'])) {
        session_start();
        $LAVD_ID = $_SESSION["id"];
        $image = base64_encode(file_get_contents($_FILES['file']["tmp_name"]));     
        include("connect-db.php");
        exec_query("UPDATE TB_LAVADEIRAS SET LAVD_IMAGEM = '$image' WHERE LAVD_CODIGO = $LAVD_ID;");
        header('Location: ../login.php');
    }
?>
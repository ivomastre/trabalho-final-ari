<?php
    if (isset($_GET['id'])) {
        session_start();
        $id = $_SESSION["id"];
        $LAV_ID = $_GET['id'];
        $password = $_POST['password'];
        include("connect-db.php");
        $result = exec_query("DELETE FROM TB_LAVADAS WHERE LAV_CODIGO = $LAV_ID AND LAV_LAVD_CODIGO = $id");
        header("Location: ../index.php");
    }
?>
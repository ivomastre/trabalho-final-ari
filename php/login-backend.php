<?php
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];
        include("connect-db.php");

        $result = exec_query("SELECT LAVD_CODIGO FROM TB_LAVADEIRAS WHERE LAVD_LOGIN = '$email' AND LAVD_SENHA = '$password'");
        $row = $result->fetch_row();
        echo $row;
        if(is_null($row[0])){
            header('Location: ../login.php?result=false');
        }
        else{
            session_start();
            $_SESSION["id"] = $row[0];
            header('Location: ../index.php');
        }
        
    }
?>
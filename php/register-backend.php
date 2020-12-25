<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        include("connect-db.php");
        exec_query("INSERT INTO TB_LAVADEIRAS (LAVD_NOME, LAVD_LOGIN, LAVD_SENHA) VALUES ('$name','$email','$password');");
        header('Location: ../login.php');
    }
?>
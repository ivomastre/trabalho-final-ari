<?php
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $image = base64_encode(file_get_contents($_FILES['file']["tmp_name"]));
        
        include("connect-db.php");
        exec_query("INSERT INTO TB_LAVADEIRAS (LAVD_NOME, LAVD_LOGIN, LAVD_SENHA, LAVD_IMAGEM) VALUES ('$name','$email','$password', '$image');");
        header('Location: ../login.php');
    }
?>
<?php

    if (isset($_POST['submit'])) {
        session_start();
        $LAVD_ID = $_SESSION["id"];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $quantity = $_POST['quantity'];
        $value = $_POST['value'];




        include("connect-db.php");
        exec_query("INSERT INTO `TB_LAVADAS` (`LAV_CLIENTENOME`, `LAV_DATA`, `LAV_QUANTITY`, `LAV_VALOR`, `LAV_LAVD_CODIGO`) VALUES ('$name', '$date', $quantity, $value, $LAVD_ID)");
        header('Location: ../index.php');
    }
?>
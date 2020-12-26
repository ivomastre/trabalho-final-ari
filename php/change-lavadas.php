<?php
    if (isset($_POST['submit_change']) && isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $LAVD_ID = $_SESSION["id"];
        $name = $_POST['name_change'];
        $date = $_POST['date_change'];
        $quantity = $_POST['quantity_change'];
        $value = $_POST['value_change'];
        include("connect-db.php");
        echo "UPDATE `TB_LAVADAS` SET LAV_CLIENTENOME = '$name', LAV_DATA = '$date', LAV_QUANTITY = $quantity,  LAV_VALOR = $value WHERE LAV_CODIGO = $id";
        exec_query("UPDATE `TB_LAVADAS` SET LAV_CLIENTENOME = '$name', LAV_DATA = '$date', LAV_QUANTITY = $quantity,  LAV_VALOR = $value WHERE LAV_CODIGO = $id");
        header("Location: ../index.php");
    }
?>
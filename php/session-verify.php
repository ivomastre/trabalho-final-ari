<?php

function is_session_active(){
    error_reporting(0);
    session_start();
    return $_SESSION['id'] ? TRUE : FALSE;
}
?>
<?php
function is_session_active(){
    session_start();
    return $_SESSION['id'] ? TRUE : FALSE;
}
?>
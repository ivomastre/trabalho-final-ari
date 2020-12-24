<?php
    function exec_query($sql){
        $link = new mysqli("127.0.0.1", "root", "usbw", "lavadeira_db");
        $result = $link -> query($sql);
        $link -> close();
        return $result;
    }
?>
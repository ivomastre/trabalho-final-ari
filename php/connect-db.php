<?php
    function exec_query($sql){
        
        $link = new mysqli("127.0.0.1", "root", "usbw", "lavadeira_db");
        if ($link-> connect_errno) {
            echo "Failed to connect to MySQL: " . $link -> connect_error;
        }
        
        $result = $link -> query($sql);
        $link -> close();
        return $result;
    }
?>
<?php
    function header_show($active){
        echo "<nav>
            <div class='nav-wrapper'>
                <a href='#!' class='brand-logo'>"
        ;

        include("connect-db.php");
        session_start();
        $LAVD_ID = $_SESSION["id"];
        $result = exec_query("SELECT LAVD_NOME FROM TB_LAVADEIRAS WHERE LAVD_CODIGO = $LAVD_ID");
        while($row = $result->fetch_assoc()){
            $name = $row["LAVD_NOME"];
            echo "Olá, $name";
        }
        $li [0]= "<li class = '%a%'><a href='index.php'>Home</a></li>";
        $li [1]= "<li class = '%a%'><a href='stats.php'>Statistics</a></li>";
        $li [2]= "<li class = '%a%'><a href='./php/logout.php' class='material-icons prefix'>logout</a></li>";
        $arr_length = count($li);
        $output = "";
        for($i=0;$i<$arr_length;$i++)
        {
            if($i===$active){
                $li[$i] = str_replace('%a%', "active", $li[$i]);
            }
            else{
                $li[$i] = str_replace('%a%', "", $li[$i]);
            }
            $output = $output.$li[$i];
        }
        
        echo "    
                </a>
                <a href='#' data-target='mobile-demo' class='sidenav-trigger'><i class='material-icons'>menu</i></a>
                
                <ul class='right hide-on-med-and-down'>
                    $output
                </ul>
            </div>
            
        </nav>
        <ul class='sidenav' id='mobile-demo'>
            $output
        </ul>";
    }
?>
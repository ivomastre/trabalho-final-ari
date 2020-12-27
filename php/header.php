<?php
    function header_show($active){
        
        
        session_start();
        $LAVD_ID = $_SESSION["id"];
        $result = exec_query("SELECT LAVD_NOME, LAVD_IMAGEM FROM TB_LAVADEIRAS WHERE LAVD_CODIGO = $LAVD_ID LIMIT 1");
        $photo = '';
        while($row = $result->fetch_assoc()){
            $name = $row["LAVD_NOME"];
            $photo = $row["LAVD_IMAGEM"];
            echo "<nav>
                <div class='nav-wrapper'>
                    
                    
                    <img src='data:image/png;base64,$photo' width='65' class='circle responsive-img hide-on-med-and-down'>
                   
                    
                    <a class='brand-logo'>";

            echo "Hello, $name";
        }
        $li [0]= "<li class = '%a%'><a href='index.php'>Home</a></li>";
        $li [1]= "<li class = '%a%'><a href='stats.php'>Statistics</a></li>";
        $li [2] = "<li class = '%a%'><a href='settings.php' class='material-icons prefix'>settings</a></li>";
        $li [3]= "<li class = '%a%'><a href='./php/logout.php' class='material-icons prefix'>logout</a></li>";
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
            <div class='row'>
                
                <div class='col s12 offset-s4'>
                    <img src='data:image/png;base64,$photo' width='65' class='circle responsive-img'>
                </div>                        
            </div>
            $output
        </ul>";
    }
?>
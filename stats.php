<!DOCTYPE html>
<html>

<head>
    <?php
        include("./php/session-verify.php");
        if(!is_session_active()){
            header("Location: ./login.php");
        };
    ?>
    <?php
        include("php/connect-db.php");
        session_start();
        $id = $_SESSION['id'];
        
        $result = exec_query("SELECT DATE(LAV_DATA) as LAV_DATA FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id GROUP BY DATE(LAV_DATA)");
        $result2 = exec_query("SELECT SUM(LAV_VALOR) as LAV_VALOR FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id GROUP BY DATE(LAV_DATA)");
    ?>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="style.css">
    <!-- QUERYMINE Page Center Css -->

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems1 = document.querySelectorAll('.sidenav');
            var instances1 = M.Sidenav.init(elems1);
        });
        
    </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>


<body class="<?php echo $bodyclass ?>">
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Lavadeiras</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li class = "active"><a href="stats.php">Statistics</a></li>
            </ul>
        </div>
        
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li><a  href="index.php">Home</a></li>
        <li class = "active"><a href="stats.php">Statistics</a></li>
    </ul>


    <div id="myDiv"></div>
    <script>
        var data = [
            {
                x:[
                    <?php
                        while($row = $result->fetch_array()){
                            $aux = $row['LAV_DATA'];
                            echo "'$aux',";
                        }
                    ?>
                ],
                y: [
                    <?php
                    
                        while($row1 = $result2->fetch_array()){
                            $aux = $row1['LAV_VALOR'];
                            echo "'$aux',";
                        }
                    ?>
                ],
                type: 'scatter'
            }
        ];

    Plotly.newPlot('myDiv', data);
    </script>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    
</body>

</html>
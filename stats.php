<!DOCTYPE html>
<html>

<head>
    <?php
    include("./php/session-verify.php");
    if (!is_session_active()) {
        header("Location: ./login.php");
    };
    ?>
    <?php
    include("php/connect-db.php");
    session_start();
    $id = $_SESSION['id'];
    if (isset($_POST['submit'])) {
        $start = $_POST['start'];
        $end = $_POST['end'];
        #between fazer aqui
        $result = exec_query("SELECT DATE(LAV_DATA) as LAV_DATA FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id AND DATE(LAV_DATA) BETWEEN '$start' AND '$end' GROUP BY DATE(LAV_DATA)");
        $result2 = exec_query("SELECT SUM(LAV_VALOR) as LAV_VALOR FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id AND DATE(LAV_DATA) BETWEEN '$start' AND '$end' GROUP BY DATE(LAV_DATA)");
    } else {
        $result = exec_query("SELECT DATE(LAV_DATA) as LAV_DATA FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id GROUP BY DATE(LAV_DATA)");
        $result2 = exec_query("SELECT SUM(LAV_VALOR) as LAV_VALOR FROM `TB_LAVADAS` WHERE LAV_LAVD_CODIGO = $id GROUP BY DATE(LAV_DATA)");
    }
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
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems, {
                "format": "yyyy-mm-dd"
            });
        });
    </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>


<body class="<?php echo $bodyclass ?>">
    <?php
    include("./php/header.php");
    header_show(1);
    ?>


    <div id="myDiv"></div>
    <script>
        var data = [{
            x: [
                <?php
                while ($row = $result->fetch_array()) {
                    $aux = $row['LAV_DATA'];
                    echo "'$aux',";
                }
                ?>
            ],
            y: [
                <?php

                while ($row1 = $result2->fetch_array()) {
                    $aux = $row1['LAV_VALOR'];
                    echo "'$aux',";
                }
                ?>
            ],
            type: 'scatter'
        }];

        Plotly.newPlot('myDiv', data);
    </script>
    <div class="container">
        <div class="row">
            <div class="col s6 offset-s3">
                <form action="stats.php" method="post">
                    <div class="col s4">
                        Start:
                        <input type="text" class="datepicker" name="start">

                    </div>
                    <div class="col s4">
                        Ending:
                        <input type="text" class="datepicker" name="end">

                    </div>
                    <div class="col s6 offset-s3 p-t-5">

                        <button class="waves-effect waves-light btn-small" type="submit" name="submit">Submit
                            <i class="material-icons right">send</i>
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


</body>

</html>
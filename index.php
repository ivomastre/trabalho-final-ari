<!DOCTYPE html>
<html>

<head>
    <?php
        include("./php/session-verify.php");
        if(!is_session_active()){
            header("Location: ./login.php");
        };
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
            var elems = document.querySelectorAll('.datepicker');
            var instances = M.Datepicker.init(elems);
            var elems1 = document.querySelectorAll('.sidenav');
            var instances1 = M.Sidenav.init(elems1);
        });
        
    </script>
    
</head>


<body class="<?php echo $bodyclass ?>">
    <nav>
        <div class="nav-wrapper">
            <a href="#!" class="brand-logo">Lavadeiras</a>
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            
            <ul class="right hide-on-med-and-down">
                <li class = "active"><a href="index.php">Home</a></li>
                <li><a href="stats.php">Statistics</a></li>
            </ul>
        </div>
        
    </nav>
    <ul class="sidenav" id="mobile-demo">
        <li class = "active"><a  href="index.php">Home</a></li>
        <li><a href="stats.php">Statistics</a></li>
    </ul>
    

    
      
    


    <div class="container p-t-5">
        <table class="z-depth-1 responsive-table highlight">
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php
                include("./php/connect-db.php");
                session_start();
                $LAVD_ID = $_SESSION["id"];

                $result = exec_query("SELECT LAV_CODIGO, LAV_CLIENTENOME, LAV_DATA, LAV_QUANTITY, LAV_VALOR FROM TB_LAVADAS WHERE LAV_LAVD_CODIGO = $LAVD_ID");
                while($row = $result->fetch_array()){
                    $name = $row['LAV_CLIENTENOME'];
                    $date = $row['LAV_DATA'];
                    $quantity = $row['LAV_QUANTITY'];
                    $value = $row['LAV_VALOR'];
                    $id = $row['LAV_CODIGO'];
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$date</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>$value</td>";
                    echo "<td>
                            <a href='/php/change.php?id=$id' class='material-icons prefix'>settings</a>
                            <a href='/php/delete.php?id=$id' class='material-icons prefix'>delete</a>
                        </td>";
                    echo "</td>";
                }   
            ?>
                <tr>

                    
                </tr>
                <tr>
                    <div class="row">
                        <form action="./php/add-lavadas.php" method="POST">
                            <div class="row">
                                <td>
                                    <div class="row">
                                        <div class="input-field col s4 m12">
                                            <input id="name" type="text" name="name" class="validate">
                                            <label for="name">Client Name</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="input-field col s4 m12">
                                            <input id="date" type="datetime-local" name="date" class="validate">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="input-field col s4 m12">
                                            <input id="quantity" type="number" name="quantity" class="validate">
                                            <label for="quantity">Quantity</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="input-field col s4 m12">
                                            <input id="value" type="number" step="any" name="value" class="validate">
                                            <label for="value">Value</label>
                                        </div>
                                    </div>
                                </td>
                                <td><div class="row">
                                        <div class="input-field col s4 m12">
                                            <button class="waves-effect waves-light btn-small" type="submit" name="submit">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </div>
                        </form>
                    </div>
                </tr>
            </tbody>
        </table>
    </div>




    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
    </script>


</body>

</html>
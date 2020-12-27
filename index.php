<!DOCTYPE html>
<html>

<head>
    <?php
    include("./php/session-verify.php");
    if (!is_session_active()) {
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
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            var elems1 = document.querySelectorAll('.sidenav');
            var instances1 = M.Sidenav.init(elems1);
        });
    </script>

</head>


<body class="<?php echo $bodyclass ?>">
    <?php 
        include("./php/header.php");
        header_show(0);
    ?>







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

                session_start();
                $LAVD_ID = $_SESSION["id"];

                $result = exec_query("SELECT LAV_CODIGO, LAV_CLIENTENOME, LAV_DATA, LAV_QUANTITY, LAV_VALOR FROM TB_LAVADAS WHERE LAV_LAVD_CODIGO = $LAVD_ID");
                while ($row = $result->fetch_array()) {
                    $name = $row['LAV_CLIENTENOME'];
                    $date = $row['LAV_DATA'];
                    $quantity = $row['LAV_QUANTITY'];
                    $value = $row['LAV_VALOR'];
                    $id = $row['LAV_CODIGO'];
                    if (isset($_GET['id_change']) &&    $_GET['id_change'] == $id) {
                        echo "
                        <tr>
                        <form action='./php/change-lavadas.php?id=$id' method='POST'>
                            <div class='row'>
                                <td>
                                    <div class='row'>
                                        <div class='input-field col s4 m12'>
                                            <input id='name2' type='text' name='name_change' class='validate'>
                                            <label for='name2'>Client Name</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='row'>
                                        <div class='input-field col s4 m12'>
                                            <input id='date2' type='datetime-local' name='date_change' class='validate'>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='row'>
                                        <div class='input-field col s4 m12'>
                                            <input id='quantity2' type='number' name='quantity_change' class='validate'>
                                            <label for='quantity2'>Quantity</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class='row'>
                                        <div class='input-field col s4 m12'>
                                            <input id='value2' type='number' step='any' name='value_change' class='validate'>
                                            <label for='value2'>Value</label>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <button type='submit' name='submit_change'><i class='material-icons prefix'>check</i></button>
                                    <a href='./index.php' class='material-icons prefix'>close</a>
                                </td>
                            </div>
                        </form>";
                        echo "</tr>";
                        continue;
                    }
                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$date</td>";
                    echo "<td>$quantity</td>";
                    echo "<td>$value</td>";
                    echo "<td>
                            <a href='?id_change=$id' class='material-icons prefix modal-trigger'>settings</a>
                            <a href='./php/delete-lavadas.php?id=$id' class='material-icons prefix'>delete</a>
                        </td>";

                    echo "</tr>";
                }
                ?>
                <?php

                ?>

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
                                <td>
                                    <div class="row">
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
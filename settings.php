<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    include("./php/session-verify.php");
    if (!is_session_active()) {
        header("Location: ./login.php");
    };
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems1 = document.querySelectorAll('.sidenav');
            var instances1 = M.Sidenav.init(elems1);

        });
    </script>

</head>

<body>
    <?php
    include("php/connect-db.php");
    include("./php/header.php");
    header_show(2);
    ?>
    <div class="container">
        <div class="card-panel grey lighten-5 z-depth-1">
            <div class="row">
                <div class="col s12 offset-s6">
                    <img src='data:image/png;base64,<?php
                            session_start();

                            $LAVD_ID = $_SESSION['id'];

                            $result = exec_query("SELECT LAVD_IMAGEM FROM TB_LAVADEIRAS WHERE LAVD_CODIGO = $LAVD_ID LIMIT 1");
                            $photo = '';
                            while ($row = $result->fetch_assoc()) {
                                $photo = $row["LAVD_IMAGEM"];
                            }
                            echo $photo;
                            ?>' width='65' class='circle responsive-img'>
                </div>
                <form enctype="multipart/form-data" action="php/change-lavadeiras.php" method="post">
                    <div class="file-field input-field col s12">
                        <div class="btn col s6">
                            <i class="material-icons left">camera_front</i>
                            <span>Procurar</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper col s6">
                            <input class="file-path validate " type="text" placeholder="Anexe aqui sua foto">
                        </div>
                    </div>
                    <div class="col s12 center p-t-5">
                        <button class="btn waves-effect waves-light" type="submit" name="submit">Update
                            <i class="material-icons right">settings</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>
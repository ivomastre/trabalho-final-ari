<!DOCTYPE html>
<html>

<head>
    <?php
        include("./php/session-verify.php");
        if(is_session_active()){
            header("Location: ./index.php");
        };
    ?>
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css" media="screen,projection" />

    <link rel="stylesheet" href="style.css">
    <!-- QUERYMINE Page Center Css -->

    <style>
        html,
        body {
            height: 100%;
        }

        html {
            display: table;
            margin: auto;
        }

        body {
            display: table-cell;
            vertical-align: middle;
        }
    </style>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
        if (isset($_GET['result'])) {
            $bodyclass = "red";
        } else {
            $bodyclass = "cyan";
        }
    ?>
</head>


<body class="<?php echo $bodyclass?>">


    <!-- Form Section -->
    <div class="container">
        <form action="php/login-backend.php" method="POST">
            <!-- Change The Form Method From Here-->
            <div class="card-panel grey lighten-5 z-depth-1">
                <div class="row">
                    <div class="col s4">
                        <img class="circle responsive-img" src="img/user.png">
                    </div>
                    <div class="col s8">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email" type="text" name="email" class="validate">
                            <label for="icon_prefix">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">password</i>
                            <input id="password" type="password" name="password" class="validate">
                            <label for="icon_telephone">Password</label>
                        </div>

                        <div class="col s12 center">
                            <button class="btn waves-effect waves-light" type="submit" name="submit">Login
                                <i class="material-icons right">login</i>
                            </button>
                        </div>

                        <div class="col s12 center p-t-5">

                            <a class="btn waves-effect waves-light" href="register.php">Create account

                                <i class="material-icons right">add_box</i>
                            </a>
                        </div>
                    </div>
                </div>
        </form>
    </div>




    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js">
    </script>
</body>

</html>
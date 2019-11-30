<?php
session_start();

// hardcode value of given parameters
$pw = "admin";
$uname = "admin";
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Welcome Page</title>
        <meta name="viewport" content="width=device-width">
        <style>
            a:link, a:visited {
                background-color: green;
                color: white;
                padding: 14px 25px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
            }


            a:hover, a:active {
                background-color: #4CAF50;
            }
        </style>
    </head>
    <body>
        <?php
        if (isset($_POST["uname"]) && ($_POST["uname"] == $uname) && (isset($_POST["psw"]) && ($_POST["psw"] == $pw))) {
            include 'connect.php';
            $_SESSION['flag'] = true;

            echo '<h1>Congratulations, You are Successfully Login</h1>';
            echo '<br>';
            echo '<a href="select.php">Click Here to View Your Collection</a>';
        } else {
            echo '<h1>Please Try Again</h1>';
            echo '<a href="index.html">Back To Login</a>';
        }
        ?>
    </body>

</html>

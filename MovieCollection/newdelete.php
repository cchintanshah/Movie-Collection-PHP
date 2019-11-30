<?php
session_start();
include 'connect.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="styles.css">
        <style>

        </style>
    </head>
    <body>
        <?php
        $id = $_POST["mid"];
        $command = "DELETE FROM Movies WHERE MovieID = $id";
        $stmt = $dbh->prepare($command);
        $stmt->execute();
        $result = $stmt->execute();
        
        if ($result) {
            echo'Delete Successful at ID :'.$id;
        } else {
            echo 'error';
        }

        $mid = [];
        $mtitle = [];
        $date = [];
        $status = [];
        $imdb = [];
        $mdes = [];

        // prepare the command
        $command = "SELECT * FROM Movies ORDER BY MovieID";
        $stmt = $dbh->prepare($command);
        $stmt->execute();



        while ($row = $stmt->fetch()) {

            array_push($mid, $row['MovieID']);
            array_push($mtitle, $row['MovieTitle']);
            array_push($date, $row['ReleaseDate']);
            array_push($status, $row['Watched']);
            array_push($imdb, $row['IMDB']);
            array_push($mdes, $row['MovieDescription']);
        }
        echo ' <h1>Movie Collection</h1>';
        echo '<div id="container">';

        if (isset($mid)) {
            echo "<table><tr><th>Movie ID</th><th>Movie Title</th><th>Release Date</th><th>Watched</th><th>IMDb Rating</th><th>Movie Description</th></tr>";
            for ($i = 0; $i < count($mid); $i++) {
                echo "<tr><td>{$mid[$i]}</td><td>{$mtitle[$i]}</td><td>{$date[$i]}</td><td>{$status[$i]}</td><td>{$imdb[$i]}</td><td>{$mdes[$i]}</td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
    <div id="link">
        <br>
        <a href="insert.html">Add Movie to Your Collection</a>
        <a href="delete.php">Delete Movie From Your Collection</a>
        <a href="update.php">Update Movie in Your Collection</a>
        <a href="select.php">View Your Collection</a>
    </div>
</body>
</html>

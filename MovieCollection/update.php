<?php
session_start();
include 'connect.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
        $mid = [];
        $mtitle = [];
        $date = [];
        $status = [];
        $imdb = [];
        $mdes = [];

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
            echo "<table><tr><th>Movie ID</th><th>Movie Title</th><th>Release Date</th><th>Watched</th><th>IMDb Rating</th><th>Movie Description</th><th>Option</th></tr>";
            for ($i = 0; $i < count($mid); $i++) {
                echo "<tr><td>{$mid[$i]}</td><td>{$mtitle[$i]}</td><td>{$date[$i]}</td><td>{$status[$i]}</td><td>{$imdb[$i]}</td><td>{$mdes[$i]}</td><td>"
                . "<form action='edit.php' method='post'>
            <input type='hidden' name='mid' value='$mid[$i]'>
            <input type='submit' value='Update' >
            </form></td></tr>";
            }
            echo "</table>";
        }
        ?>
    </div>
</body>
</html>

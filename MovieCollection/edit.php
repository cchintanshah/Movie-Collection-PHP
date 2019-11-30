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
        $id = $_POST["mid"];
        $command = "SELECT * FROM Movies WHERE MovieID = $id";
        $stmt = $dbh->prepare($command);
        $stmt->execute();

        while ($row = $stmt->fetch()) {

            $mid = $row['MovieID'];
            $mtitle = $row['MovieTitle'];
            $date =  $row['ReleaseDate'];
            $status = $row['Watched'];
            $imdb = $row['IMDB'];
            $mdes =  $row['MovieDescription'];
        }
        ?>
        <div class="container">
            <h1> Insert Data </h1>
            <form action="newupdate.php" method="POST">
                <label><b>Movie ID</b></label>
                <input type="text" placeholder="Enter ID" name="mid" value="<?= $mid?>">

                <label><b>Movie Title</b></label>
                <input type="text" placeholder="Enter Movie Title" name="mtitle" value="<?= $mtitle?>" required>

                <label><b>Release Date</b></label>
                <input type="text" placeholder="formate : YYYY-MM-DD" name="date" value="<?= $date?>" required><br>

                <label><b>IMDb Rating</b></label>
                <input type="text" placeholder="Enter Rating" name="imdb" value="<?= $imdb?>" required><br>
                <label><b>Watched ?</b></label>
                <input type="radio" name="choice" value="<?= $status?>"> Yes
                <input type="radio" name="choice" value="<?= $status?>"> No<br><br>

                <label><b>Movie Description</b></label>
                <input type="text" placeholder="Enter Description" name="mdes" value="<?= $mdes?>">

                <button type="submit">Update</button>
            </form>
        </div>
    </body>
</html>

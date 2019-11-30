<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=000770680', "000770680", "19951202");
} catch (Exception $e) {
    die('Could not connect to DB: ' . $e->getMessage());
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


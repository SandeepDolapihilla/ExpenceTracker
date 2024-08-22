<?php
$connection = mysqli_connect('localhost', 'root', '', 'CityTaxiDB');

if (mysqli_connect_errno()) {
    die('Database connection failed: ' . mysqli_connect_error());
} else {
    echo "Connected successfully!";
}
?>

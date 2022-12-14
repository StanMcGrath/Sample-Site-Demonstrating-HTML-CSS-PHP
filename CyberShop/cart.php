<?php
//create database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "G00398383";

$connection = mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
//inserts into database via SQL query the products added to cart by user.
$userid = $_REQUEST['userid'];
$productid = $_REQUEST['productid'];
$sql = "INSERT INTO cart (user_id, product_id) VALUES ({$userid},{$productid})";
$result = mysqli_query($connection,$sql);

die($sql);
mysqli_close($connection);
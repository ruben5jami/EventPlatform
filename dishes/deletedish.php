<?php


$dish_id=$_GET['dish_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM dishes WHERE dish_id='$dish_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getdishinfo.php');
}

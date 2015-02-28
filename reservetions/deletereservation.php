<?php


$reservation_id=$_GET['reservation_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM reservations WHERE reservation_id='$reservation_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getreservationinfo.php');
}

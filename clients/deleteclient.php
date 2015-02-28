<?php


$client_id=$_GET['client_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM clients WHERE client_id='$client_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getclientinfo.php');

}

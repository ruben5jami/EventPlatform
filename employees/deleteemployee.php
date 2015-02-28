<?php


$e_id=$_GET['employee_id'];


require_once('../mysqli_connect.php');

$query = "DELETE FROM employees WHERE employee_id='$e_id'";

$stmt = mysqli_prepare($dbc, $query);

mysqli_stmt_execute($stmt);

$affected_rows = mysqli_stmt_affected_rows($stmt);

if($affected_rows == 1) {

    header('Location: getemployeeinfo.php');
}

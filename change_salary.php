<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php

// Get a connection for the database
require_once('mysqli_connect.php');

if(isset($_POST['submit'])) {

    $data_missing = array();


    if (empty($_POST['employee_id'])) {

        // Adds name to array
        $data_missing[] = 'employee id';

    } else {

        // Trim white space from the name and store the name
        $e_id = trim($_POST['employee_id']);

    }

    if (empty($_POST['salary'])) {

        // Adds name to array
        $data_missing[] = 'new salary';

    } else {

        // Trim white space from the name and store the name
        $n_s = trim($_POST['salary']);

    }

}



// Create a query for the database
$query = "UPDATE employees SET employee_salary=".$n_s." WHERE employee_id='".$e_id."';";
//add from form

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<h2> Datadabse Was Updated </h2>';



} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


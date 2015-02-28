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


    if (empty($_POST['reservation_id'])) {

        // Adds name to array
        $data_missing[] = 'reservation id';

    } else {

        // Trim white space from the name and store the name
        $r_id = trim($_POST['reservation_id']);

    }

    if (empty($_POST['number_of_invite'])) {

        // Adds name to array
        $data_missing[] = 'number of invite';

    } else {

        // Trim white space from the name and store the name
        $n_o_invite = trim($_POST['number_of_invite']);

    }

}



// Create a query for the database
$query = "UPDATE reservations SET reservation_invited=".$n_o_invite." WHERE reservations.reservation_id=".$r_id.";";
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


<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
        <h1>MY Bill</h1>
<?php

if(isset($_POST['submit'])) {

    $data_missing = array();

    if (empty($_POST['reservation_id'])) {

        // Adds name to array
        $data_missing[] = 'reservation id';

    } else {

        // Trim white space from the name and store the name
        $r_id = trim($_POST['reservation_id']);

    }
}

// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT bills.bill_id, bills.bill_reservation_id, bills.bill_issue_date, bills.bill_last_payment_date, bills.bill_amount,
	reservations.reservation_client_id, clients.client_name, clients.client_address, clients.client_phone
FROM clients
	JOIN reservations
    	ON reservations.reservation_client_id=clients.client_id
    JOIN bills
    	ON bills.bill_reservation_id=".$r_id."";


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){



    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    $row = mysqli_fetch_array($response);

        echo
            '<h4>BIll ID: ' . $row['bill_id'] .'</h4>'.
            '<h4>Client ID: ' . $row['reservation_client_id'].'</h4>'.
            '<h4>Client Name: ' . $row['client_name'].'</h4>'.
            '<h4>Client Address: ' . $row['client_address'].'</h4>'.
            '<h4>Client Phone: ' . $row['client_phone'].'</h4>'.
            '<h4>Reservation ID: ' . $row['bill_reservation_id'] .'</h4>'.
            '<h4>Bill Issue Date: ' . $row['bill_issue_date'] .'</h4>'.
            '<h4>Bill Last Payment: ' . $row['bill_last_payment_date'] .'</h4>'.
            '<h4>Bill Amount: ' . $row['bill_amount'].'$';
        echo "</h4>";

    echo "<p><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-print'></span> Print</button></p>";
    echo "<p><button type='button' class='btn btn-info'><span class='glyphicon glyphicon-envelope'></span> E-Mail Client</button></p>";
}
else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


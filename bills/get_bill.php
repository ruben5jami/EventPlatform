<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style>
</head>
<body>
<div class="container">
    <div class="row">
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
$query = "SELECT bill_id, bill_reservation_id, bill_issue_date,
	 bill_last_payment_date, bill_amount FROM bills WHERE bill_reservation_id=".$r_id.";";


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response) {


    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while ($row = mysqli_fetch_array($response)) {
        $query2 = "SELECT reservation_client_id, reservation_invited FROM reservations WHERE reservation_id=" . $row['bill_reservation_id'] . ";";
        $response2 = @mysqli_query($dbc, $query2);
        while ($row2 = mysqli_fetch_array($response2)) {
            $query3 = "SELECT client_name, client_address, client_phone FROM clients WHERE client_id=" . $row2['reservation_client_id'] . ";";
            $response3 = @mysqli_query($dbc, $query3);
            $row3 = mysqli_fetch_array($response3);
            echo " <div class='container'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='invoice-title'>
                <h2>My Bill</h2><h3 class='pull-right>Order #" . $row['bill_id'] . "</h3>
            </div>
            <hr>
            <div class='row'>
                <div class='col-xs-6'>
                    <address>
                        <strong>Billed To:</strong><br>"
                . $row3['client_name'] . "<br>"
                . $row3['client_address'] . "<br>
                        Israel
                    </address>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-6'>
                    <address>
                        <strong>Payment Method:</strong><br>
                        Visa ending **** 4242<br>
                        jsmith@email.com
                    </address>
                </div>
                <div class='col-xs-6 text-right'>
                    <address>
                        <strong>Order Date:</strong><br>
                        " . $row['bill_issue_date'] . "<br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-12'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    <h3 class='panel-title'><strong>Order summary</strong></h3>
                </div>
                <div class='panel-body'>
                    <div class='table-responsive'>
                        <table class='table table-condensed'>
                            <thead>
                            <tr>
                                <td><strong>Reservation ID</strong></td>
                                <td class='text-center'><strong>Last Payment Date</strong></td>
                                <td class='text-center'><strong>People Invited</strong></td>
                                <td class='text-right'<strong>Price</strong></td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>" . $row['bill_reservation_id'] . "</td>
                                <td class='text-center'>" . $row['bill_last_payment_date'] . "</td>
                                <td class='text-center'>" . $row2['reservation_invited'] . "</td>
                                <td class='text-right'>$" . $row['bill_amount'] . "</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>";
        }
    }
}
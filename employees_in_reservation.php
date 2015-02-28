<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Employees In Reservation</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database

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

$query = "SELECT  employee_id FROM reservation_has_employees WHERE  reservation_id=".$r_id.";";


// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Employee ID</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        $query2 = "SELECT  employee_first_name FROM employees WHERE  employee_id=".$row['employee_id'].";";
        $response2 = @mysqli_query($dbc, $query2);
        $row2 = mysqli_fetch_array($response2);

        echo '<tr><td align="left">' .
            $row['employee_id'] .' - '. $row2['employee_first_name']. '</td>';

        echo '</tr>';
    }

    echo '</tbody></table>';



} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


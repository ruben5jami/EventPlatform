<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Employees in Hall</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT rhe.employee_id, r.reservation_hall_id
FROM reservation_has_employees AS rhe, reservations AS r
WHERE r.reservation_id=rhe.reservation_id;";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Employee ID</th>
	<th align="left">Hall ID</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        $query2 = "SELECT employee_first_name FROM employees WHERE employee_id=". $row['employee_id'] . ";";
        $response2 = @mysqli_query($dbc, $query2);
        $row2 = mysqli_fetch_array($response2);


        echo '<tr><td align="left">' .
            $row['employee_id'] . ' - '. $row2['employee_first_name'] .'</td><td align="left">' .
            $row['reservation_hall_id'] . '</td>';

        echo '</tr>';
    }

    echo '</tbody></table>';



} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


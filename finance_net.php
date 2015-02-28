<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>NET Finance</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT reservation_invited, reservation_menu_id FROM reservations;";
$sum = 0;

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Reservation invited</th>
	<th align="left">Menu price</th>
	<th align="left">Total per Event</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        $querymenu = "SELECT menu_price FROM menus WHERE menu_id=". $row['reservation_menu_id'] .";";

        $response2 = @mysqli_query($dbc, $querymenu);
        $row2 = mysqli_fetch_array($response2);
        $event =  $row['reservation_invited'] *  $row2['menu_price'];
        $sum = $sum + $event;
        echo '<tr><td align="left">' .
            $row['reservation_invited'] . '</td><td align="left">' .
            $row2['menu_price'] . '</td><td align="left">' .
            $event . '</td>';



        echo '</tr>';
    }

    echo '</tbody></table>';
} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

    $query2 = "SELECT employee_salary, employee_start_date FROM employees;";
    $total_sum =0;


// Get a response from the database by sending the connection
// and the query
    $response3 = @mysqli_query($dbc, $query2);

// If the query executed properly proceed
    if($response3){

        echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>employee salary</th>
	<th align="left">mounth working</th>
	<th align="left">Start Date</th></tr></thead><tbody>';

        // mysqli_fetch_array will return a row of data from the query
        // until no further data is available
        while($row3 = mysqli_fetch_array($response3)){

            $date1 = $row3['employee_start_date'];
            $date2 = date("Y-m-d");

            $ts1 = strtotime($date1);
            $ts2 = strtotime($date2);

            $year1 = date('Y', $ts1);
            $year2 = date('Y', $ts2);

            $month1 = date('m', $ts1);
            $month2 = date('m', $ts2);

            $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
            $total_sum = $total_sum + $diff * $row3['employee_salary'];


            echo '<tr><td align="left">' .
                $row3['employee_salary'] . '</td><td align="left">' .
                $diff . '</td><td align="left">' .
                $row3['employee_start_date']  . '</td>';



            echo '</tr>';
        }

        echo '</tbody></table>';
        echo '<h1>Total Net: '.$total_sum.'$</h1>';


} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);



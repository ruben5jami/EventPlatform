<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Employee Works Where?</h1>
<?php
// Get a connection for the database
require_once('mysqli_connect.php');

// Create a query for the database
$query = "SELECT employees.employee_id, employees.employee_first_name, employees.employee_last_name,jobs.job_description
            FROM employees
            INNER JOIN jobs
            ON jobs.job_id=employees.employee_job;";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Employee ID</th>
	<th align="left">Employee First Name</th>
	<th align="left">Employee Last Name</th>
	<th align="left">Job</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['employee_id'] . '</td><td align="left">' .
            $row['employee_first_name'] . '</td><td align="left">' .
            $row['employee_last_name'] . '</td><td align="left">' .
            $row['job_description'] . '</td>';

        echo '</tr>';
    }

    echo '</tbody></table>';

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


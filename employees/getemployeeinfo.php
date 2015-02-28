<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>
<body>
<h1>Employee List</h1>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// Create a query for the database
$query = "SELECT employee_id, employee_first_name, employee_last_name, employee_gender, employee_date_of_birth, employee_start_date
      ,employee_job, employee_address, employee_phone, employee_salary  FROM employees";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table  class="table table-striped"><thead>

	<tr><td align="left"><b>Employee ID</th>
	<th align="left">Employee First Name</th>
	<th align="left">Employee Last Name</th>
	<th align="left">Employee Gender</th>
	<th align="left">Employee Date Of Birth</th>
	<th align="left">Employee Start Date</th>
	<th align="left">Employee Job ID</th>
	<th align="left">Employee Address</th>
	<th align="left">Employee Phone</th>
	<th align="left">Employee Salary</th>
	<th align="left">delete</th></tr></thead><tbody>';

    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available
    while($row = mysqli_fetch_array($response)){

        echo '<tr><td align="left">' .
            $row['employee_id'] . '</td><td align="left">' .
            $row['employee_first_name'] . '</td><td align="left">' .
            $row['employee_last_name'] . '</td><td align="left">' .
            $row['employee_gender'] . '</td><td align="left">' .
            $row['employee_date_of_birth'] . '</td><td align="left">' .
            $row['employee_start_date'] . '</td><td align="left">' .
            $row['employee_job'] . '</td><td align="left">' .
            $row['employee_address'] . '</td><td align="left">' .
            $row['employee_phone'] . '</td><td align="left">' .
            $row['employee_salary'] . '</td>';
        echo '<td><a href=deleteemployee.php?employee_id='.$row['employee_id'] . '>delete</a> </td>';
        echo '</tr>';
    }

    echo '</tbody></table>';


    echo "<h2><a href='addemployee.php'>Add another</a></h2>" ;

} else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


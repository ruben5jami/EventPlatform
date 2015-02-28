<html>
<head>
    <title>Info</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<h1>Who Booked What?</h1>
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

    if (empty($_POST['employee_id1'])) {

        // Adds name to array
        $data_missing[] = 'employee id1';

    } else {

        // Trim white space from the name and store the name
        $e_1 = trim($_POST['employee_id1']);

    }

    if (empty($_POST['employee_id2'])) {

        // Adds name to array
        $data_missing[] = 'employee id2';

    } else {

        // Trim white space from the name and store the name
        $e_2 = trim($_POST['employee_id2']);

    }

    if (empty($_POST['employee_id3'])) {

        // Adds name to array
        $data_missing[] = 'employee id3';

    } else {

        // Trim white space from the name and store the name
        $e_3 = trim($_POST['employee_id3']);

    }

    if (empty($_POST['employee_id4'])) {

        // Adds name to array
        $data_missing[] = 'employee id4';

    } else {

        // Trim white space from the name and store the name
        $e_4 = trim($_POST['employee_id4']);

    }

    if (empty($_POST['employee_id5'])) {

        // Adds name to array
        $data_missing[] = 'employee id5';

    } else {

        // Trim white space from the name and store the name
        $e_5 = trim($_POST['employee_id5']);

    }

    if (empty($_POST['employee_id6'])) {

        // Adds name to array
        $data_missing[] = 'employee id6';

    } else {

        // Trim white space from the name and store the name
        $e_6 = trim($_POST['employee_id6']);

    }


}


$query = "INSERT INTO reservation_has_employees(reservation_id, employee_id) VALUES (".$r_id.",".$e_1."),
                (".$r_id.",".$e_2."),(".$r_id.",".$e_3."),(".$r_id.",".$e_4."),(".$r_id.",".$e_5."),(".$r_id.",".$e_6.");";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){


    echo '<h2>Employees Added</h2>';

    }




 else {

    echo "Couldn't issue database query<br />";

    echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);


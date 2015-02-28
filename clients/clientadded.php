
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['client_id'])){

        // Adds name to array
        $data_missing[] = 'client Id';

    } else{

        // Trim white space from the name and store the name
        $c_id = trim($_POST['client_id']);

    }

    if(empty($_POST['client_name'])){

        // Adds name to array
        $data_missing[] = 'client Name';

    } else{

        // Trim white space from the name and store the name
        $c_name = trim($_POST['client_name']);

    }

    if(empty($_POST['client_address'])){

        // Adds name to array
        $data_missing[] = 'client address';

    } else {

        // Trim white space from the name and store the name
        $c_address = trim($_POST['client_address']);

    }

    if(empty($_POST['client_phone'])){

        // Adds name to array
        $data_missing[] = 'client phone';

    } else {

        // Trim white space from the name and store the name
        $c_phone = trim($_POST['client_phone']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO clients (client_id, client_name, client_address,
        client_phone) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "isss",$c_id, $c_name , $c_address, $c_phone);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Client Entered';

            echo "<br><p><a href='addclient.php'>Add another</a></p>" ;

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo "Error Occurred<br />";

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}


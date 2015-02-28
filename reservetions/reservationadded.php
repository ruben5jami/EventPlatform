
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['reservation_id'])){

        // Adds name to array
        $data_missing[] = 'reservation id';

    } else{

        // Trim white space from the name and store the name
        $r_id= trim($_POST['reservation_id']);

    }

    if(empty($_POST['reservation_date'])){

        // Adds name to array
        $data_missing[] = 'reservation date';

    } else{

        // Trim white space from the name and store the name
        $r_date = trim($_POST['reservation_date']);

    }

    if(empty($_POST['reservation_employee_took'])){

        // Adds name to array
        $data_missing[] = 'reservation employee took';

    } else {

        // Trim white space from the name and store the name
        $r_e_took = trim($_POST['reservation_employee_took']);

    }

    if(empty($_POST['reservation_invited'])){

        // Adds name to array
        $data_missing[] = 'reservation invited';

    } else {

        // Trim white space from the name and store the name
        $r_invited = trim($_POST['reservation_invited']);

    }

    if(empty($_POST['reservation_hall_id'])){

        // Adds name to array
        $data_missing[] = 'reservation hall id';

    } else {

        // Trim white space from the name and store the name
        $r_h_id = trim($_POST['reservation_hall_id']);

    }

    if(empty($_POST['reservation_menu_id'])){

        // Adds name to array
        $data_missing[] = 'reservation menu id';

    } else {

        // Trim white space from the name and store the name
        $r_m_id = trim($_POST['reservation_menu_id']);

    }

    if(empty($_POST['reservation_event_id'])){

        // Adds name to array
        $data_missing[] = 'reservation event id';

    } else {

        // Trim white space from the name and store the name
        $r_e_id = trim($_POST['reservation_event_id']);

    }

    if(empty($_POST['reservation_client_id'])){

        // Adds name to array
        $data_missing[] = 'reservation client id';

    } else {

        // Trim white space from the name and store the name
        $r_c_id = trim($_POST['reservation_client_id']);

    }



    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO reservations (reservation_id, reservation_date, reservation_employee_took,
                      reservation_invited, reservation_hall_id, reservation_menu_id,
                      reservation_event_id, reservation_client_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "isiiiiii", $r_id, $r_date, $r_e_took,  $r_invited, $r_h_id, $r_m_id, $r_e_id, $r_c_id);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Reservation Entered';

            echo "<br><p><a href='addreservation.php'>Add another</a></p>" ;

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


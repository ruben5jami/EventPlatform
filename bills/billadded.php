
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['bill_id'])){

        // Adds name to array
        $data_missing[] = 'bill id';

    } else{

        // Trim white space from the name and store the name
        $b_id = trim($_POST['bill_id']);

    }

    if(empty($_POST['reservation_id'])){

        // Adds name to array
        $data_missing[] = 'reservation id';

    } else{

        // Trim white space from the name and store the name
        $r_id = trim($_POST['reservation_id']);

    }

    if(empty($_POST['last_payment_possible'])){

        // Adds name to array
        $data_missing[] = 'last payment possible';

    } else {

        // Trim white space from the name and store the name
        $l_payment = trim($_POST['last_payment_possible']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');
        $query = "SELECT reservation_invited, reservation_menu_id FROM reservations;";
        $sum = 0;
        $response = @mysqli_query($dbc, $query);
        while($row = mysqli_fetch_array($response)) {

            $query2 = "SELECT menu_price FROM menus WHERE menu_id=" . $row['reservation_menu_id'] . ";";
            $response2 = @mysqli_query($dbc, $query2);
            $row2 = mysqli_fetch_array($response2);
            $event = $row['reservation_invited'] * $row2['menu_price'];
            $sum = $sum + $event;
        }



        $query3 = "INSERT INTO bills (bill_id, bill_reservation_id, bill_issue_date,
        bill_last_payment_date, bill_amount) VALUES (?, ?, NOW(), ?, ?)";

        $stmt = mysqli_prepare($dbc, $query3);


        mysqli_stmt_bind_param($stmt, "iisi",$b_id, $r_id, $l_payment, $sum);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Bill Entered';


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


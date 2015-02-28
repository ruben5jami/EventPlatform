
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['employee_id'])){

        // Adds name to array
        $data_missing[] = 'employee id';

    } else{

        // Trim white space from the name and store the name
        $e_id = trim($_POST['employee_id']);

    }

    if(empty($_POST['employee_first_name'])){

        // Adds name to array
        $data_missing[] = 'employee First Name';

    } else{

        // Trim white space from the name and store the name
        $e_first_name = trim($_POST['employee_first_name']);

    }

    if(empty($_POST['employee_last_name'])){

        // Adds name to array
        $data_missing[] = 'employee Last Name';

    } else {

        // Trim white space from the name and store the name
        $e_last_name = trim($_POST['employee_last_name']);

    }

    if(empty($_POST['employee_gender'])){

        // Adds name to array
        $data_missing[] = 'employee gender';

    } else {

        // Trim white space from the name and store the name
        $e_gender = trim($_POST['employee_gender']);

    }

    if(empty($_POST['employee_date_of_birth'])){

        // Adds name to array
        $data_missing[] = 'employee date of birth';

    } else {

        // Trim white space from the name and store the name
        $e_date_of_birth = trim($_POST['employee_date_of_birth']);

    }

    if(empty($_POST['employee_start_date'])){

        // Adds name to array
        $data_missing[] = 'employee start date';

    } else {

        // Trim white space from the name and store the name
        $e_start_date = trim($_POST['employee_start_date']);

    }

    if(empty($_POST['employee_job'])){

        // Adds name to array
        $data_missing[] = 'employee job';

    } else {

        // Trim white space from the name and store the name
        $e_job_id = trim($_POST['employee_job']);

    }

    if(empty($_POST['employee_address'])){

        // Adds name to array
        $data_missing[] = 'employee address';

    } else {

        // Trim white space from the name and store the name
        $e_address = trim($_POST['employee_address']);

    }

    if(empty($_POST['employee_phone'])){

        // Adds name to array
        $data_missing[] = 'employee phone';

    } else {

        // Trim white space from the name and store the name
        $e_phone = trim($_POST['employee_phone']);

    }

    if(empty($_POST['employee_salary'])){

        // Adds name to array
        $data_missing[] = 'employee salary';

    } else {

        // Trim white space from the name and store the name
        $e_salary = trim($_POST['employee_salary']);

    }


    if(empty($data_missing)){

        require_once('../mysqli_connect.php');

        $query = "INSERT INTO employees (employee_id, employee_first_name, employee_last_name,
        employee_gender, employee_date_of_birth, employee_start_date, employee_job,
         employee_address, employee_phone, employee_salary) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbc, $query);


        mysqli_stmt_bind_param($stmt, "isssssissi",$e_id, $e_first_name, $e_last_name, $e_gender, $e_date_of_birth,
            $e_start_date, $e_job_id, $e_address, $e_phone, $e_salary);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Employee Entered';


            echo "<br><p><a href='addemployee.php'>Add another</a></p>" ;

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


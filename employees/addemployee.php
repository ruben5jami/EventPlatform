<html>
<head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Employee</h2>
    <?php
    // Get a connection for the database
    require_once('../mysqli_connect.php'); ?>
<form action="employeeadded.php" method="post">

    <p  class="form-group">Employee ID:
        <input type="number" name="employee_id" size="30" value=""  class="form-control"/>
    </p>

    <p  class="form-group">Employee First Name:
        <input type="text" name="employee_first_name" size="30" value=""  class="form-control"/>
    </p>

    <p  class="form-group">Employee Last Name:
        <input type="text" name="employee_last_name" size="30" value="" class="form-control" />
    </p>

    <p  class="form-group">Employee Gender:
        <input type="text" name="employee_gender" size="30" value="" class="form-control" />
    </p>

    <p  class="form-group">Employee Date Of Birth:
        <input type="date" name="employee_date_of_birth" size="30" value="" placeholder="yyyy-mm-dd" class="form-control" />
    </p>

    <p class="form-group">Employee Start Date:
        <input type="date" name="employee_start_date" size="30" value="" placeholder="yyyy-mm-dd" class="form-control"/>
    </p>

    <p class="form-group">Employee Job:
        <select name="employee_job" class="form-control" >
            <?php
            $query = "SELECT job_id, job_description FROM jobs";
            $response = @mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($response)){

                echo '<option value='.$row['job_id'].'>'. $row['job_id'].' - '.$row['job_description'].'</option>';

            }?>
        </select>
    </p>

    <p class="form-group">Employee Address:
        <input type="text" name="employee_address" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Employee Phone:
        <input type="text" name="employee_phone" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Employee Salary:
        <input type="number" name="employee_salary" size="30" value="" class="form-control" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
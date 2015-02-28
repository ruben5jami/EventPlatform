<html>
<head>
    <title>Add dish</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="container">
    <h2>Employees in Reservation</h2>
    <?php
    // Get a connection for the database
    require_once('mysqli_connect.php'); ?>
    <form action="reservation_orderd.php" method="post">

        <p  class="form-group">Employee ID:
            <select name="employee_id" class="form-control" >
                <?php
                $query = "SELECT employee_id, employee_first_name FROM employees";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['employee_id'].'>'. $row['employee_id']." - ". $row['employee_first_name'].'</option>';

                }?>
            </select>
        </p>
        <p>
            <input type="submit" name="submit" value="Send" class="btn btn-default" />
        </p>

    </form>
</div>
</body>
</html>
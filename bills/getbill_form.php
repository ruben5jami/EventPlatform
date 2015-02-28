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
    <form action="getbill.php" method="post">
        <p class="form-group">Reservation ID:
            <select name="reservation_id" class="form-control" >
                <?php
                $query = "SELECT reservation_id FROM reservations";
                $response = @mysqli_query($dbc, $query);
                while($row = mysqli_fetch_array($response)){

                    echo '<option value='.$row['reservation_id'].'>'. $row['reservation_id'].'</option>';

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
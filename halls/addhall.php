<html>
<head>
    <title>Add Hall</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Hall</h2>
<form action="halladded.php" method="post">


    <p class="form-group">Hall Name:
        <input type="number" name="hall_id" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Hall Name:
        <input type="text" name="hall_name" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Hall Capacity:
        <input type="number" name="hall_capacity" size="30" value="" class="form-control" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
<html>
<head>
    <title>Add dish</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
    <h2>Number Of Events</h2>
    <form action="number_of_events.php" method="post">

        <p  class="form-group">From:
            <input type="date" name="from" size="30" value="" class="form-control" />
        </p>
        <p  class="form-group">To:
            <input type="date" name="to" size="30" value="" class="form-control" />
        </p>

        <p>
            <input type="submit" name="submit" value="Send" class="btn btn-default" />
        </p>

    </form>
</div>
</body>
</html>
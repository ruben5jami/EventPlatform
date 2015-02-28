<html>
<head>
    <title>Add Client</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>

<div class="container">
    <h2>Add a New Client</h2>

<form action="clientadded.php" method="post">

    <p class="form-group">client ID:
        <input type="number" name="client_id" size="30" value="" class="form-control"  />
    </p>

    <p class="form-group">client Name:
        <input type="text" name="client_name" size="30" value="" class="form-control"  />
    </p>

    <p class="form-group">client address:
        <input type="text" name="client_address" size="30" value="" class="form-control"  />
    </p>

    <p class="form-group">client phone:
        <input type="text" name="client_phone" size="30" value="" class="form-control"  />
    </p>
    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
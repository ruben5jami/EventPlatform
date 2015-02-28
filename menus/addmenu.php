<html>
<head>
    <title>Add Menu</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Menu</h2>
<form action="menuadded.php" method="post">

    <p class="form-group">Menu Name:
        <input type="number" name="menu_id" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Menu Name:
        <input type="text" name="menu_name" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Menu Price:
        <input type="number" name="menu_price" size="30" value="" class="form-control" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
<html>
<head>
    <title>Add Job</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../form.css">
</head>
<body>
<div class="container">
<h2>Add a New Job</h2>
<form action="jobadded.php" method="post">


    <p class="form-group">Job Description:
        <input type="number" name="job_id" size="30" value="" class="form-control" />
    </p>

    <p class="form-group">Job Description:
        <input type="text" name="job_description" size="30" value="" class="form-control" />
    </p>

    <p>
        <input type="submit" name="submit" value="Send" class="btn btn-default" />
    </p>

</form>
    </div>
</body>
</html>
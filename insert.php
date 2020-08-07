<?php
require_once "fetch.php";
//checking whether the  value is set or not using isset function
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $field = ["firstname" => $fname, "lastname" => $lname, "email" => $email, "address" => $address];

    //creating the object to instantaite the class
    $id = $_GET['del'];
    $obj = new Operation();
    $obj->insert($field, "record");
    $obj->delete("record", $id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Fill the form</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="text-center">Add records</h1>
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input type="text" class="form-control" placeholder="Enter firstname" name="fname" id="">
                </div>
                <div class="form-group">
                    <label for="lname">Lastname:</label>
                    <input type="text" class="form-control" placeholder="Enter lastname" id="" name="lname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" id="" name="email">
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter address" id="" name="address">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="record.css">
    <title>Document</title>
</head>

<body>
    <?php
    include "fetch.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $obj1 = new Operation();
        $result = $obj1->selectData("record", $id);
    }



    //checking whether the  value is set or not using isset function

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $field = ["firstname" => $fname, "lastname" => $lname, "email" => $email, "address" => $address];

        //creating the object to instantaite the class

        $id = $_POST['id'];
        $obj = new Operation();
        $obj->update("record", $field, $id);
    }
    ?>

    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="text-center">Edit records</h1>
            <form action="authen.php" method="post">
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input type="text" class="form-control" placeholder="Enter firstname" name="fname" id="" value="<?php echo $result['firstname']; ?>">
                </div>
                <div class="form-group">
                    <label for="lname">Lastname:</label>
                    <input type="text" class="form-control" placeholder="Enter lastname" id="" name="lname" value="<?php echo $result['lastname']; ?>">
                </div>
                <div class=" form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" id="" name="email" value="<?php echo $result['email']; ?>">
                </div>

                <div class=" form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter address" id="" name="address" value=" <?php echo $result['address']; ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            </form>
        </div>
    </div>
</body>

</html>

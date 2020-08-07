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
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="text-center">Fill the form to register</h1>
            <?php
            include "fetch.php";
            if (isset($_POST['submit'])) {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm = $_POST['reenter'];
                $field = ["firstname" => $fname, "lastname" => $lname, "email" => $email, "password" => $password, "confirm" => $confirm];
                if (empty($fname) || empty($fname) || empty($lname) || empty($email) || empty($password)) {

            ?>
                    <h4 class="alert alert-danger">
                        <?php echo "Please fill the required fields"; ?>
                    </h4>
                <?php
                }
                if ($password != $confirm) {
                ?>
                    <h4 class="alert alert-danger">
                        <?php echo "Passwod doesn't match"; ?>;
                    </h4>
            <?php

                } else {
                    $obj = new Operation();
                    $obj->insert($field, "register");
                }
            }
            ?>


            <form action="register.php" method="post">
                <div class="form-group">
                    <label for="firstname">First name:</label>
                    <input type="text" class="form-control" placeholder="Enter firstname" name="fname" id="fname">
                </div>
                <div class="form-group">
                    <label for="lname">Lastname:</label>
                    <input type="text" class="form-control" placeholder="Enter lastname" id="lname" name="lname">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
                </div>

                <div class="form-group">
                    <label for="reenter">Confirm Password:</label>
                    <input type="password" class="form-control" placeholder="Confirm-password" id="reenter" name="reenter">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
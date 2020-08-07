<?php
session_start();
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
    <link rel="stylesheet" href="record.css">
    <title>Document</title>
</head>

<body>

    <div class="container mt-5">

        <h1 class="text-center">Fill the form to login</h1>
        <h1>Not registered yet??Please register to continue.... <a href="register.php" class="text-primary">Register Here!!</a></h1>
        <div class="jumbotron">

            <?php
            $conn = mysqli_connect("localhost", "root", "", "student");

            if (!$conn) {
                die("Connection failed!!" . mysqli_connect_error());
            }

            if (isset($_POST['submit'])) {


                $email = $_POST['email'];
                $password = $_POST['pass'];
                //fetching data from the database 
                $select = "SELECT * FROM register WHERE email='$email' AND password='$password'";
                $result = mysqli_query($conn, $select);
                $num = mysqli_num_rows($result);

                //checking whether the input given by the user is present in database or not
                if ($num > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['name'] = $row['firstname'];
                    header("location:record.php");
                } else { ?>
                    <h6 class="alert alert-danger"><?php echo "Invalid email or password"; ?></h6>
            <?php

                }
            }
            ?>
            <form action="" method="post">

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter email" id="" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" placeholder="Enter password" id="" name="pass">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>


            </form>

        </div>
    </div>
</body>

</html>
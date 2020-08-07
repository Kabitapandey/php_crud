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
    <title>Student Records</title>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <a href="login.php" class="btn btn-primary float-right">LogIn</a>
            <h4 class="mb-5 text-center">All employees</h4>
            <form action="" method="post">
                <button class="btn btn-success" name="insert">Add EMployee Details</button>
            </form>

            <table class="table table-bordered table-striped">
                <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Operations</th>
                </tr>
                <?php
                require_once "fetch.php";
                $obj = new Operation();
                $result = $obj->select("record");
                foreach ($result as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <form action="" method="POST">
                            <td><button name="edit" class="btn btn-primary">Edit</button>
                                <button name="delete" class="btn btn-danger">Delete</button>
                            </td>

                        </form>
                    </tr> <?php
                        }
                        if (isset($_POST['insert']) || isset($_POST['edit']) || isset($_POST['delete'])) { ?>
                    <h6 class="alert alert-danger"><?php echo "You must login to insert,update or delete the data"; ?></h6>
                <?php

                        }
                ?>
            </table>
        </div>
    </div>

</body>

</html>
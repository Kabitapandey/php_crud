<?php
session_start();
error_reporting(0);
if (!$_SESSION['name']) {
    header("location:data.php");
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
    <link rel="stylesheet" href="record.css">
    <title>Student Records</title>
</head>

<body>


    <!--using the bootstrap to design the layout for the web browser-->
    <div class="container mt-5">
        <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
        <div class="jumbotron">
            <h4 class="mb-5">All employees

                <button class="btn btn-success"><a href="insert.php"> Add employees details</a></button>
                <a href="logout.php" class="btn btn-primary float-right">LogOut</a>
            </h4>

            <!--using table to print the data fetched from the database in table-->
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


                if (isset($_GET['del'])) {
                    $id = $_GET['del'];


                    $obj->delete("record", $id);
                }


                $obj = new Operation();
                $result = $obj->select("record");

                foreach ($result as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><a href="authen.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>&numsp;<a href="record.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                    </tr> <?php
                        }
                            ?>
            </table>
        </div>
    </div>

</body>

</html>
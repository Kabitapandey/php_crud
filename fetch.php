<?php

require_once "conn.php";

class Operation extends Connection
{
    //making select function to display the data inserted in the database in the web browser
    public function select($table)
    {
        $select = "SELECT * FROM $table  ORDER BY id DESC LIMIT 10";
        $result = $this->connect("student")->query($select);
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                //puttting the value of the database in the array
                $data[] = $row;
            }
            return $data;
        }
    }

    //creating a function to inser the value in the database
    public function insert($fields, $table)
    {
        try {
            //using the implode function to join an array with the string$
            $fieldColumns = implode(",", array_keys($fields));
            $fieldParam = implode(", :", array_keys($fields));

            //inserting data into the datbase using the sql query
            $insert = "INSERT INTO $table($fieldColumns) VALUES(:" . $fieldParam . ")";

            $stmt = $this->connect("student")->prepare($insert);
            foreach ($fields as $key => $value) {
                $stmt->bindValue(":" . $key, $value);
            }
            $exec = $stmt->execute();
            if ($exec == true) {
                header("location:record.php");
            }
        } catch (PDOException $e) {
            echo "Error!!" . $e->getMessage();
        }
    }

    //creating the method to fetch the data to be updated in the form field
    public function selectData($table, $id)
    {
        $sql = "SELECT * FROM $table where id=:id";
        $stmt = $this->connect("student")->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }



    //creating the method to update the record in the database
    public function update($table, $fields, $id)
    {
        try {
            $st = "";
            $counter = 1;
            $total_fields = count($fields);
            foreach ($fields as $key => $value) {
                if ($counter === $total_fields) {
                    $set = "$key=:" . $key;
                    $st = $st . $set;
                } else {
                    $set = "$key=:" . $key . ",";
                    $st = $st . $set;
                    $counter++;
                }
            }
            $sql = "UPDATE $table SET $st WHERE id=$id";

            $stmt = $this->connect("student")->prepare($sql);

            foreach ($fields as $key => $value) {
                $stmt->bindValue(":" . $key, $value);
            }

            $exec = $stmt->execute();
            if ($exec == true) {
                header("location:record.php");
            }
        } catch (PDOException $e) {
            echo "Error!!" . $e->getMessage();
        }
    }

    //creating function to delete the data from the database
    public function delete($table, $id)
    {
        $del = "DELETE FROM $table WHERE id=:id";
        $stmt = $this->connect("student")->prepare($del);
        $stmt->bindValue(":id", $id);
        $exec = $stmt->execute();
        if ($exec) {
            header("location:record.php");
        }
    }
}

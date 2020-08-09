<?php
class table
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "student";
    public $table;
    public function createDatabase($db)
    {
        try {
            $dns = "mysql:host=" . $this->host;
            $pdo = new pdo($dns, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //creating database
            $create = "CREATE Database $db";
            $pdo->exec($create);

            return $create;
        } catch (PDOException $e) {
            echo "Error!!" . $e->getMessage();
        }
    }
    public function createTable($table)
    {
        try {

            $conn = new pdo("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $table = "CREATE TABLE $table( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(50) NOT NULL,lastname VARCHAR(50) NOT NULL, email VARCHAR(100), address varchar(50) NOT NULL)";

            $conn->exec($table);
            return $table;
        } catch (PDOException $e) {
            echo "Error!" . $e->getMessage();
        }
    }
    public function table2($name)
    {
        $conn = new pdo("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
        $table = "CREATE table $name(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,email VARCHAR(100) NOT NULL,password VARCHAR(50) NOT NULL)";

        $conn->exec($table);
        return $table;
    }
    public function table3($name)
    {
        $conn = new pdo("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

        $table = "CREATE TABLE $name(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,firstname VARCHAR(50) NOT NULL,lastname VARCHAR(50) NOT NULL,email VARCHAR(100) NOT NULL,password VARCHAR(50) NOT NULL,confirm VARCHAR(50) NOT NULL)";
        $conn->exec($table);
    }
}

$obj = new table();
$obj->createDatabase("student");
$obj->createTable("record");
$obj->table2("login");
$obj->table3("register");

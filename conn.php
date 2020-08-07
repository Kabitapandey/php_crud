<?php
class Connection
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';

    //making function to connect with the database
    public function connect($dbname)
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $dbname;
            $conn = new pdo($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }
}

<?php 

class dbh {
    private $host = "localhost";
    private $dbName = "company_db";
    private $username ="root";
    private $password = "password";

     protected function connect(){
        try {

            $pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->username,
                $this->password
            );

            return $pdo;

        } catch(PDOException $e) {

            die($e->getMessage());

        }
    }
    
}

?>
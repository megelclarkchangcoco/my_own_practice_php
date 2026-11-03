<?php 

require_once __DIR__ . "/../includes/dbh.inc.php";

class users extends dbh {

    public function registerUser($username, $password){
        // hashed the password from register
        $hash_pass = password_hash($password, PASSWORD_DEFAULT);

        // query to save datavbase
        $sql  = "INSERT INTO users (username, password) VALUES(?, ?);";

        // prepare sql
        $stmt = $this->connect()->prepare($sql);

        // execute queries
        $stmt->execute([$username, $hash_pass]);

    }


    public function loginUser($username, $password){

       // find username in database
       $sql = "SELECT * FROM users WHERE username = ?";

       // prepare sql
       $stmt = $this-> connect()->prepare($sql);

       //execute queries
       $stmt -> execute([$username]);

       // get one row mysql
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       // check if user is exist
       if(!$user){
            echo "user not found";
            return;
       } 

       // compare plain passwowrd and hashed
       if(password_verify($password, $user['password'])){
            echo "login sucessfully!";
       } else {
            echo "wrong password or email!";
       }
    }


}

?>
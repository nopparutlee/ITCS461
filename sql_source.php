<?php
    /*
    CREATE TABLE User(
        Username VARCHAR(20) PRIMARY KEY NOT NULL,
        Password VARCHAR(40) NOT NULL
    );

    The password is hashed in the database using a broken hash function, 
    you will have to crack the password using a brute force tool.

    The real password will have maximum length equal to 8.
    */
    $posted_username = $_POST["username"];
    $debug = $_POST["debug"];

    $servername = "localhost";
    $username = "student";
    $password = ":D";
    $dbname = "User";

    $connection = mysql_connect($servername, $username, $password);
    mysql_select_db($dbname, $connection);
    if ($connection->connect_error){
        die("Connection failed: ". $connection->connect_error);
    }

    $query = "SELECT * FROM User WHERE Username=\"".$posted_username."\"";
    if(isset($debug)){
        echo "Executing query: $query<br>";
    }

    $result = mysql_query($query);
    if($result){
        if(mysql_num_rows > 0){
            echo "This user exists<br>";
        }
        else{
            echo "User does not exists<br>";
        }
    }
    else{
        echo "Error in query<br>";
    }
    mysql_close();
?>

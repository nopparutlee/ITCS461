<?php

//	ini_set("log_errors", 1);
//	ini_set("error_log", "/tmp/err-r.log");

//	ini_set('error_reporting', E_ALL);
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

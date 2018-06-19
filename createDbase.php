<!-- CREATING A DATABASE "messenger" -->

<?php

$host="localhost"; 

$root="root"; 
$root_password=""; 

$user='marty';
$pass='jjPHhdSo4';
$db="messenger"; 

    try {
        $dbh = new PDO("mysql:host=$host;port=3306", $root, $root_password);
        $stmt = $dbh->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME ='".$db."'");
        $output = (bool) $stmt->fetch();
        if(!$output){
            $dbh->exec("CREATE DATABASE `$db`;
                CREATE USER '$user'@'localhost' IDENTIFIED BY '$pass';
                GRANT ALL ON `$db`.* TO '$user'@'localhost';
                FLUSH PRIVILEGES;");
            error_log("Database ".$db." created successfully!")
            or die(print_r($dbh->errorInfo(), true));
        } else {
            echo("<p>Database '".$db."' already exists!</p>");
        }

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>
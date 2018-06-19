<?php 
// require_once("pdo.php");
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
$db_name = 'messenger';
// $stmt = $pdo->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'messenger'");
$stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME ='".$db_name."'");
$output = (bool) $stmt->fetch();

if($output){
    echo("<p>The database exists</p>");
} else {
    echo("<p>The database does not exist!</p>");
}


?>
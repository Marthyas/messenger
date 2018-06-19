<?php 
// require_once("pdo.php");
$pdo = new PDO('mysql:host=localhost;port=3306','root','');
//Check if the dbase exists
$stmt = $pdo->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'messenger'");
$exists = (bool) $stmt->fetch();

//Dropping the dbase 
if($exists){
    $stmt = $pdo->exec("DROP DATABASE messenger");
    error_log("Database 'messenger' dropped successfully");
    echo("<p>Database dropped!</p>");
} else {
    echo("<p>The database to be dropped does not exist!!!</p>");
}

?>
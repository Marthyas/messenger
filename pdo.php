<?php


// $pdo = new PDO('mysql:host=localhost;port=3306;dbname=messenger','marty','jjPHhdSo4');
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=messenger', "root","");
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>


<?php
session_start();

if(isset($_POST['logout'])){
    unset($_SESSION['account']);
    header('Location: logout.php');
    return;
}

if(!isset($_GET["name"])){
    error_log("Attempted access without logging in");
    die("<p style='color:red; text-align:center;margin-top:60px;font-size:22px'><b>ACCESS DENIED. YOU ARE NOT LOGGED IN!</b></p>");

} else {
    require_once "pdo.php";
    $_SESSION['account'] = $_GET["name"];
}

/* if(isset($_POST['submit'])){
    
    $sql = "INSERT INTO member (name) VALUES (:name)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':name' => $_SESSION['account']));
    header('Location: chatroom.php?name='.urlencode($_SESSION['account']));
    return;
} */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900,400italic,700italic" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
    integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>ChatRoom</title>
</head>
<body>
    <div class="row" style="text-align:center; margin:20px; padding:20px">
    <!-- <button style="margin:20px" class="btn btn-danger"><a href="logout.php"> Log Out</a></button> -->
<p><h1 style="margin: 0 auto"><?php echo "Welcome to ChatRoom, ".htmlentities($_GET['name'])."!"?> </h1>

</div>    
<div class="container">
    <p><b>Message:</b></p>
        <div class="chat">
            <form method="post">
                <div class="form-group row"> 
                <p><b><?php echo htmlentities($_GET['name'].":") ?></b></p>
                    <div class="col-sm-7">
                        <b><input type="textarea" class="form-control" name="message" value="" id="message"></b>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" class="submit" name="submit" value="Odeslat">
                        
                    </div>
                    <div class="col-sm-2">
                    <input type="submit" class="submit" name="logout" value="Odhlásit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
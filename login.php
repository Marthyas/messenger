<?php 
session_start();

if(isset($_POST['cancel'])){
    unset($_SESSION['account']);
    header('Location: index.php');
    return;
}

$message = false;
$salt = 'XyZzy12*_';
// echo(hash('md5', $salt."petFlask?"));
$stored_hash = 'ad05872f931c3434223668b7416bb641';

if(isset($_POST['userName']) && isset($_POST['password'])){
    unset($_SESSION['account']);
    if(strlen($_POST['userName']) < 1 || strlen($_POST['password']) < 1){
        $message = "User name and password are required";
        $_SESSION['message'] = $message;
        $_SESSION['account'] = $_POST['userName'];
        header('Location: login.php');
        return;
    } else if($_POST['userName'] !== "Marty" && $_POST['userName'] !== "Hana"){
        $message = "Incorrect User Name";
        $_SESSION['message'] = $message;
        $_SESSION['account'] = $_POST['userName'];
        header('Location: login.php');
        return;
    } else {
        $check = hash('md5', $salt.$_POST['password']);
        if($check == $stored_hash) {
            $_SESSION['account'] = $_POST['userName'];
            error_log("Login success ".$_POST['userName']);
            header("Location: chatroom.php?name=".urlencode($_SESSION['account']));
            return;
        } else {
            $message = "Incorrect password";
            $_SESSION['message'] = $message;
            $_SESSION['account'] = $_POST['userName'];
            error_log("Login fail - wrong password ".$_POST['userName']." $check");
            header('Location: login.php');
            return;
        }
    }
}

if(isset($_SESSION['account'])){
    $name = $_SESSION['account'];
} else {
    $name = "";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Messenger</title>
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,900,400italic,700italic" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
    integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <!-- <style>
    body {
    padding-top: 40px;
    text-align: center;
    }
    </style> -->
</head>
<body>
          
            <div class="container col-md-6 offset-md-3">
                <h1 class="text-center">Log In</h1>
               <?php 
                    if(isset($_SESSION['message'])){
                        echo("<p style='color:red'>".htmlentities($_SESSION['message'])."</p>\n");
                        unset($_SESSION['message']);
                    }
               ?>
                <form method="post">
                    <div class="form-group row"> 
                        <label class="col-sm-4 col-form-label" for="userName">User Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name= "userName" value="<?php echo(htmlentities($name))?>" id="userName">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" for="password">Password</label> 
                        <div class="col-sm-8">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8 offset-sm-4">
                            <input type="submit" class="btn btn-primary" value="Log In" name="submit"> 
                            <!-- <button class="btn btn-primary"><a href="index.php">Cancel</a></button> -->
                            <input type="submit" class="btn btn-primary" name="cancel" value="Cancel">
                        </div>
                    </div>
        
                </form>
            </div >
         
    

</body>
</html>
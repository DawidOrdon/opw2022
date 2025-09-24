<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="name">nazwa ciasteczka</label><input type="text" name="name" id="name">
    <input type="submit" value="sprawdz ciastko">
</form>
<a href="./set_cookie.php"><button>ustaw ciastka</button></a>
<?php
    if(!empty($_POST['name'])){
        if(isset($_COOKIE[$_POST['name']])){
            echo "mamy ciastko o nazwie ".$_POST['name'];
        }else{
            echo "ktos zjadl ciastko";
        }
    }
?>
</body>
</html>
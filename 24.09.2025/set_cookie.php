<!doctype html>
<html lang="en">
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
    <label for="time">data przydatnosci do zjedzenia</label><input type="number" name="time" id="time">
    <input type="submit" value="nowe ciastka">
</form>
<a href="./check_cookie.php"><button>sprawdz ciasteczka</button></a>
<?php
    if(!empty($_POST['name']) && !empty($_POST['time'])&& is_numeric($_POST['time'])&&$_POST['time']>0){
        setcookie($_POST['name'],1,time()+$_POST['time']);
    }
?>
</body>
</html>
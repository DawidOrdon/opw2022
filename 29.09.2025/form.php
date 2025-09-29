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
<a href="./form.php">form</a>
<a href="./show.php">show</a>
<a href="./destroy.php">destroy</a>
<form action="" method="post">
    <input type="text" name="text" id="">
    <input type="submit" value="przeslij">
</form>
<?php
    if(!empty($_POST['text'])){
        session_start();
        $_SESSION['text'] = $_POST['text'];
        echo"prawidłowo zapisano dane";
    }
?>
</body>
</html>
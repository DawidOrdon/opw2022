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
    <input type="text" name="txt" id="">
    <input type="submit" name="dodaj">
</form>
<?php
    session_start();
    if(isset($_POST["dodaj"])&&!empty($_POST["txt"])){
        $_SESSION["odp"][]=$_POST["txt"];
    }
    if(isset($_SESSION["odp"])){
        foreach($_SESSION["odp"] as $odp){
            echo"<div class=''>";
            print_r($odp);
            echo"</div>";
        }
    }
?>
</body>
</html>
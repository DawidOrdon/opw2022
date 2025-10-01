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
    <input type="number" name="l1" id=""><input type="number" name="l2" id=""><input type="text" name="napis" id="">
    <input type="submit" value="">
</form>
<?php
    if(!empty($_POST['l1']) && !empty($_POST['l2']) && is_numeric($_POST['l1']) && is_numeric($_POST['l2'])){
        if($_POST['l1'] % $_POST['l2']==2){
            echo"frytki";
        }else{
            if(!empty($_POST['napis'])){
                echo strlen($_POST['napis'])." porcji pizzy";
            }
        }
    }
?>
</body>
</html>
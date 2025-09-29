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
    <input type="number" name="liczba1" id="">
    <input type="number" name="liczba2" id="">
    <input type="text" name="text" id="">
    <input type="submit" value="sprawdz">
</form>
<?php
    function check_number($name, $min, $frytki="frytki")
    {
        if(!empty($_POST[$name])&&is_numeric($_POST[$name])&&$_POST[$name]>$min){
            echo"liczba $name jest poprawna<br />";
            return $_POST[$name];
        }else{
            echo"liczba $name jest niepoprawna<br />";
            return null;
        }
//        echo strlen($frytki)."<br />";
    }
    $name = check_number("liczba1",10,"lubie frytki");
    check_number("liczba2",18);
//    check_number("text");

?>
</body>
</html>
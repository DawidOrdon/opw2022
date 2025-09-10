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
    <label for="liczba1">liczb1</label><input type="number" name="liczba1" id="liczba1">
    <label for="liczba2">liczb2</label><input type="number" name="liczba2" id="liczba2">
    <label for="dodaj">dodaj</label><input type="radio" name="co" value="1" id="dodaj">
    <label for="odejmij">odejmij</label><input type="radio" name="co" value="2" id="odejmij">
    <label for="potega">potega</label><input type="radio" name="co" value="3" id="potega">
    <input type="submit" value="oblicz">
    
</form>

<?php

    if(!empty($_POST["liczba1"])&&is_numeric($_POST["liczba1"])&&$_POST["liczba1"]>0){
        $liczba1=$_POST["liczba1"];
    }else{
        echo "podaj prawidlowa wartosc nr1<br />";
    }
    if(!empty($_POST["liczba2"])&&is_numeric($_POST["liczba2"])&&$_POST["liczba2"]>0){
        $liczba1=$_POST["liczba2"];
    }else{
        echo "podaj prawidlowa wartosc nr2<br />";
    }

    if(isset($_POST["co"])){
        switch ($_POST["co"]) {
            case 1:{

            }
            case 2:{

            }
            case 3:{

            }
            default:{
                echo "podaj prawidlowa wartosc<br />";
            }
        }
    }

?>
</body>
</html>
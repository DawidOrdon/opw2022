<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
        td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
<form action="" method="post">
    <label for="imie">imie</label>
    <input type="text" name="imie" id="imie">
    <label for="nazwisko">nazwisko</label>
    <input type="text" name="nazwisko" id="nazwisko">
    <label for="wiek">wiek</label>
    <input type="number" name="wiek" id="wiek">
    <input type="reset" value="reset">
    <input type="submit" value="wyslij">
</form>
    <table>
        <tr>
            <td>1</td>
            <td>2</td>
        </tr>
    </table>
<?php
    $error=0;
    if(!empty($_POST['imie'])&&strlen($_POST['imie'])>2){
        $imie = $_POST['imie'];
    }else{
        $error=1;
    }

    if(!empty($_POST['nazwisko'])&&strlen($_POST['nazwisko'])>2){
        $nazwisko = $_POST['nazwisko'];
    }else{
        $error=1;
    }

    if (!empty($_POST['wiek'])&&is_numeric($_POST['wiek'])&&$_POST['wiek']>0&&$_POST['wiek']<123) {
        $wiek = $_POST['wiek'];
    }else{
        $error=1;
    }
    if($error==0){
        echo $imie." ".$nazwisko." ".$wiek;
    }else{
        echo "podales zle dane";
    }

?>
</body>
</html>
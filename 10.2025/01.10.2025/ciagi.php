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
    <label for="a1">Wyraz pierwszy</label><input type="number" name="a1" id="a1">
    <label for="r">R</label><input type="number" name="r" id="r">
    <label for="n">Wyraz końcowy</label><input type="number" name="n" id="n">
    <button name="co" value="n-ty">Oblicz</button>
</form>
<form action="" method="post">
    <label for="el1">a1</label><input type="number" name="a1" id="el1">
    <label for="el2">a2</label><input type="number" name="a2" id="el2">
    <label for="el3">a3</label><input type="number" name="a3" id="el3">
    <button name="co" value="sprawdz">sprawdz</button>
</form>
<?php
    function ciag($a1, $r, $n)
    {
        $nty=$a1+($r*($n-1));
        return $nty;
    }
    function sprawdz($a1, $a2, $a3){
        if(($a1+$a3)/2==$a2){
            return "to są elementy ciągu";
        }else{
            return "to nie są elementy ciągu";
        }
    }
    if($_POST['co']=='n-ty'){
        if(!empty($_POST['a1'])&&
            !empty($_POST['r'])&&
            !empty($_POST['n'])&&
            is_numeric($_POST['a1'])&&
            is_numeric($_POST['r'])&&
            is_numeric($_POST['n'])&&
            $_POST['n']>1){
            $a1=$_POST['a1'];
            $r=$_POST['r'];
            $n=$_POST['n'];
            echo ciag($a1,$r,$n);
        }
    }
    if($_POST['co']=='sprawdz'){
        if(!empty($_POST['a1'])&&
            !empty($_POST['a2'])&&
            !empty($_POST['a3'])&&
            is_numeric($_POST['a1'])&&
            is_numeric($_POST['a2'])&&
            is_numeric($_POST['a3'])){
            echo sprawdz($_POST['a1'],$_POST['a2'],$_POST['a3']);
        }
    }

?>
</body>
</html>
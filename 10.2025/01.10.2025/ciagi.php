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
    <table>
        <tr>
            <td><label for="a1">Pierwsz wpłata</label></td>
            <td><input type="number" name="a1" id="a1" value="<?php echo $_POST['a1']!=null ? $_POST['a1'] : "" ?>"></td>
        </tr>
        <tr>
            <td><label for="va">miesięczne dopłaty</label></td>
            <td><input type="number" name="va" id="va" value="<?php echo $_POST['va']!=null ? $_POST['va'] : "" ?>"></td>
        </tr>
        <tr>
            <td><label for="q">szacowany procent w skali roku</label></td>
            <td><input type="number" name="q" id="q" value="<?php echo $_POST['q']!=null ? $_POST['q'] : "" ?>"></td>
        </tr>
        <tr>
            <td><label for="n">ile lat chcesz oszczędzać</label></td>
            <td><input type="number" name="n" id="n" value="<?php echo $_POST['n']!=null ? $_POST['n'] : "" ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><button name="co" value="n-ty" style="width: 100%">Oblicz</button>
            </td>
        </tr>
    </table>




</form>

<?php
    function ciag($a1, $va , $q, $n)
    {
        $wartosc=$a1;
        for($i=0;$i<$n*12;$i++){
            $wartosc=($wartosc+$va)*$q;
        }
        return $wartosc;
    }
    if(!empty($_POST['co'])){
        if($_POST['co']=='n-ty'){
            if(!empty($_POST['a1'])&&
                !empty($_POST['q'])&&
                !empty($_POST['n'])&&
                !empty($_POST['va'])&&
                is_numeric($_POST['a1'])&&
                is_numeric($_POST['q'])&&
                is_numeric($_POST['n'])&&
                is_numeric($_POST['va'])&&
                $_POST['n']>=0&&
                $_POST['a1']>=0&&
                $_POST['va']>=0&&
                $_POST['q']>=0){
                $a1=$_POST['a1'];
                $va=$_POST['va'];
                //miesieczne oprocentowanie
                $q=1+($_POST['q']/1200);
                $n=$_POST['n'];
                $wplaty=$a1+($va*$n*12);
                $stan = round(ciag($a1,$va,$q,$n),2);
                $zysk=round(($stan/$wplaty*100),2);
                echo "wplacilas/es: ".$wplaty." zł <br />";
                echo "stan konta po $n latach: $stan <br />";
                echo "zarobiłas/es $zysk %<br />";
            }
        }

    }



?>
</body>
</html>
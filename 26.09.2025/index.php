<?php
    if(!isset($_COOKIE['wynik'])){
        setcookie('wynik', 1, time() + 3600);
    }
    if(!isset($_COOKIE['mnoznik'])){
        setcookie('mnoznik', 1, time() + 3600);
    }
    if(isset($_GET['click'])&&isset($_COOKIE['mnoznik'])&&isset($_COOKIE['wynik'])){
        setcookie('wynik', $_COOKIE['wynik']+$_COOKIE['mnoznik'], time() + 3600);
    }
    if(!empty($_COOKIE['wynik'])&&!empty($_GET['cena'])&&!empty($_GET['mnoznik'])&&is_numeric($_GET['mnoznik'])&&is_numeric($_GET['cena'])&&$_GET['mnoznik']>0&&$_GET['cena']>0){
        if($_COOKIE['wynik']>$_GET['cena']){
            setcookie('wynik', $_COOKIE['wynik']-$_GET['cena'], time() + 3600);
            setcookie('mnoznik', $_COOKIE['mnoznik']+$_GET['mnoznik'], time() + 3600);
        }
    }
    $arr=['img.png','cookie.png','cookie2.png','cookie3.png','cookie4.png'];
    if(!empty($_COOKIE['mnoznik'])){
        if($_COOKIE['mnoznik']<100&&$_COOKIE['mnoznik']>0){
            $img='./img/'.$arr[0];
        }else if($_COOKIE['mnoznik']<1000&&$_COOKIE['mnoznik']>101){
            $img='./img/'.$arr[1];
        }else if($_COOKIE['mnoznik']<10000&&$_COOKIE['mnoznik']>1001){
            $img='./img/'.$arr[2];
        }else if($_COOKIE['mnoznik']<100000&&$_COOKIE['mnoznik']>10001){
            $img='./img/'.$arr[3];
        }else if($_COOKIE['mnoznik']>100001){
            $img='./img/'.$arr[4];
        }

    }else{
        $img='./img/img.png';
    }
?>


<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .ciastko, .upgrades{
            width: 50%;
            float: left;
        }
        img{
            width: 100%;
        }
        .upgrade, .label, .wynik{
            /*border: 1px solid black;*/
            width: 100%;
            padding: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="ciastko"><a href="?click=1"><img src="<?php echo $img;?>" alt=""></a></div>
    <div class="upgrades">
        <div class="wynik">Wynik: <?php echo !empty($_COOKIE['wynik'])? $_COOKIE['wynik'] : "" ?></div>
        <div class="wynik">Aktualny mnożnik: <?php echo !empty($_COOKIE['mnoznik'])? $_COOKIE['mnoznik'] : "" ?></div>
        <div class="label">Ulepszenia</div>
        <a href="?cena=20&mnoznik=1"><div class="upgrade">cena: 20 mnoznik +1</div></a>
        <a href="?cena=50&mnoznik=2"><div class="upgrade">cena: 50 mnoznik +2</div></a>
        <a href="?cena=100&mnoznik=4"><div class="upgrade">cena: 100 mnoznik +4</div></a>
        <a href="?cena=250&mnoznik=8"><div class="upgrade">cena: 250 mnoznik +8</div></a>
        <a href="?cena=500&mnoznik=14"><div class="upgrade">cena: 500 mnoznik +14</div></a>
        <a href="?cena=1000&mnoznik=20"><div class="upgrade">cena: 1000 mnoznik +20</div></a>
        <a href="?cena=2000&mnoznik=30"><div class="upgrade">cena: 2000 mnoznik +30</div></a>
        <a href="?cena=5000&mnoznik=50"><div class="upgrade">cena: 5000 mnoznik +50</div></a>
        <a href="?cena=15000&mnoznik=100"><div class="upgrade">cena: 15000 mnoznik +100</div></a>
        <a href="?cena=40000&mnoznik=200"><div class="upgrade">cena: 40000 mnoznik +200</div></a>
        <a href="?cena=100000&mnoznik=400"><div class="upgrade">cena: 100000 mnoznik +400</div></a>
        <a href="?cena=250000&mnoznik=1000"><div class="upgrade">cena: 250000 mnoznik +1000</div></a>
        <a href="?cena=500000&mnoznik=2000"><div class="upgrade">cena: 500000 mnoznik +2000</div></a>
        <a href="?cena=1000000&mnoznik=4000"><div class="upgrade">cena: 1000000 mnoznik +4000</div></a>
    </div>
</body>
</html>
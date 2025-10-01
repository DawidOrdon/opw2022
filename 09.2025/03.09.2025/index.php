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
    <?php
//    wypisywanie na stronie
        echo"witaj swiecie <br />";
        print"witaj swiecie"."<br />";

        //zmienne
        $zmienna=43;
        //okreslenie typu zmiennej
        echo gettype($zmienna)."<br />";
        //zmiana typu zmiennej
        settype($zmienna,"string");
        echo gettype($zmienna)."<br />";
        //sprawdzenie czy zmienna jest typu int
    if (is_int($zmienna)){
        print("<br> zmienna jest liczbą całkowitą(integer)");
    }else{
        print("<br> zmienna nie jest liczbą całkowitą(integer)");
    }
    echo 'cos \' tam ';
    echo "oto zmienna $zmienna";
    ?>


</body>
</html>
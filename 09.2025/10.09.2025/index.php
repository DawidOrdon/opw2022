<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>stale</title>
</head>
<body>

    <?php
        $zmienna = 43;
        echo $zmienna."<br />";
        $zmienna = 34;
        echo $zmienna."<br />";

        define('stala',43);
//        alternatywny zapis do php 5
        const stala2 = 34;

        echo stala."<br />";
//        stala=23; parse error
        echo stala."<br />";

        if($zmienna==2){
            echo "true<br />";
        }else{
            echo "false<br />";
        }

        //przeciwienstwo
        //nadpisanie przeciwienstwem
        $zmienna = -$zmienna;
        echo -$zmienna."<br />";
        echo $zmienna."<br />";

        $zmienna = $zmienna +20;
        $zmienna+=20;
        echo $zmienna."<br />";
    ?>
</body>
</html>
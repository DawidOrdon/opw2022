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
        $arr1=array(23,321,432,54,65,'krowa'=>'daje mleko');
        echo "<pre>";
        print_r($arr1);
        echo "</pre>";
        echo $arr1['krowa'];
        $arr1[10]="Psi patrol";
        echo "<pre>";
        print_r($arr1);
        echo "</pre>";
        $arr1[]="Ryder wzywa";
        echo "<pre>";
        print_r($arr1);
        echo "</pre>";
        $arr1[5]="Ryder wzywa";
        echo "<pre>";
        print_r($arr1);
        echo "</pre>";

        $arr2 = [43,23,54,65];
        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        $arr2[5]=43;
        $arr2[4]=99;
        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        unset($arr2[4]);
        echo "<pre>";
        print_r($arr2);
        echo "</pre>";
        $suma=0;
        $i=0;
        foreach($arr2 as $row){
            echo $row."<br />";
            $suma+=$row;
            //ograniczneie ilosci wysapien
            $i++;
            if($i==2){
                break;
            }
        }
        echo $suma."<br />";

        $wielo=[
            [43,54,6,4,[54,54,54,65]],
            'test'=>[],
            4,
            5
        ];
        echo $wielo[0][4][3];

        echo "<pre>";
        print_r($wielo);
        echo "</pre>";


        $i=10;
        switch ($i){
            case 0:{
                echo 0;
            }
            case 1:{
                echo 1;
            }
            case 2:{
                echo 2;
                break;
            }
            case 3:{
                echo 3;
            }
            default:{
                echo "inne";
            }
        }

    ?>
</body>
</html>

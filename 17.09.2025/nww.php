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
    <input type="number" name="liczby[]" id="">
    <input type="number" name="liczby[]" id="">
    <input type="number" name="liczby[]" id="">
    <input type="number" name="liczby[]" id="">
    <input type="number" name="liczby[]" id="">
    <input type="submit" value="">
</form>
    <?php
    print_r($_POST['liczby']);
    $l1=21435678;
    $l2=436543224;
    $dzielniki=[];
    $dzielniki2=[];
    while ($l1!=1){
        for($i=2;;$i++){
            if($l1%$i==0){
                $dzielniki[]=$i;
                $l1/=$i;
//                $l1=$l1/$i;
                break;
            }
        }
    }
    while ($l2!=1){
        for($i=2;;$i++){
            if($l2%$i==0){
                $dzielniki2[]=$i;
                $l2/=$i;
//                $l1=$l1/$i;
                break;
            }
        }
    }








    echo"<pre>";
    print_r($dzielniki);
    print_r($dzielniki2);
    print_r(array_count_values($dzielniki));
    echo"</pre>";

    ?>
</body>
</html>
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
    <input type="number" name="l1" id="">
    <input type="number" name="l2" id="">
    <input type="submit" value="oblicz">
</form>
<?php
    if(!empty($_POST['l1'])&&!empty($_POST['l2'])&&is_numeric($_POST['l1'])&&is_numeric($_POST['l2'])&&$_POST['l1']>0&&$_POST['l2']>0){
        $l1=$_POST['l1'];
        $l2=$_POST['l2'];
        $dzielniki1=[];
        $dzielniki2=[];
        //dla l1
        for($i=1;$i<=$l1/2;$i++){
            if($l1%$i==0){
                $dzielniki1[]=$i;
            }
        }
        $dzielniki1[]=$l1;
        //dla l2
        for($i=1;$i<=$l2/2;$i++){
            if($l2%$i==0){
                $dzielniki2[]=$i;
            }
        }
        $dzielniki2[]=$l2;

        echo "<pre>";
        print_r($dzielniki1);
        print_r($dzielniki2);
        echo "</pre>";
        $nwd=1;
        $end1=count($dzielniki1)-1;
        $end2=count($dzielniki2)-1;
        while($end1>0&&$end2>0){
//            echo("if ".$dzielniki1[$end1]." = ".$dzielniki2[$end2]." nwd = ".$dzielniki1[$end1]." <br />");
            if($dzielniki1[$end1]==$dzielniki2[$end2]){
                $nwd=$dzielniki1[$end1];
                break;
            }else{
//                echo"else if ".$dzielniki1[$end1]." > ".$dzielniki2[$end2]." $end1 -- else $end2 -- <br /><br />";
                if($dzielniki1[$end1]>$dzielniki2[$end2]){
                    $end1--;
                }else{
                    $end2--;
                }
            }
        }
        if($nwd){
            echo $nwd;
        }
    }
?>
</body>
</html>
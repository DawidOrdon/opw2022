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
    <input type="text" name="text" id="">
    <input type="number" name="liczba" id="">
    <input type="submit" value="">
</form>
<?php
    $text=false;
    $liczba=false;
    if(!empty($_POST['text'])&&strlen($_POST['text'])>3){
        $text=$_POST['text'];
    }
    if(!empty($_POST['liczba'])&&is_numeric($_POST['liczba'])&&$_POST['liczba']>0){
        $liczba=$_POST['liczba'];
    }

    if($text){
        echo strlen($text);
        echo $text;
    }

    if($liczba&&$text){
        for($i=0;$i<$liczba;$i++){
            echo $text."<br>";
        }
    }
echo"<br />";
echo"<br />";
    $a=11;
    while($a<=10){
        echo $a++;
    }
    echo"<br />";
    echo"<br />";
    $a=11;
    do{
        echo $a++;
    }while($a<=10);
echo"<br />";
echo"<br />";

echo "<table>";
for($z=0;$z<=10;$z++){
    echo "<tr>";
    for($i=0;$i<=10;$i++){
        echo "<td>X</td>";
    }
    echo"<tr>";
}
echo "</table>";
?>
</body>
</html>
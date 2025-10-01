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

<?php
$liczba = 12;
$liczba2 = 5;
$dzielniki1 = [];
$dzielniki2 = [];
for ($i = 1; $i <= $liczba / 2; $i++) {
    if ($liczba % $i == 0) {
        $dzielniki1[] = $i;
    }
}
$dzielniki1[] = $liczba;
for ($i = 1; $i <= $liczba2 / 2; $i++) {
    if ($liczba2 % $i == 0) {
        $dzielniki2[] = $i;
    }
}
$dzielniki2[] = $liczba2;
$index1 = 0;
$index2 = 0;
echo "<pre>";
print_r($dzielniki1);
print_r($dzielniki2);
echo "</pre>";
$dzielniki1 = array_reverse($dzielniki1);
$dzielniki2 = array_reverse($dzielniki2);
//    while($index1<count($dzielniki1)||$index2<count($dzielniki2)){
for (; $index1 < count($dzielniki1) || $index2 < count($dzielniki2);) {
    if ($dzielniki1[$index1] == $dzielniki2[$index2]) {
        echo $dzielniki1[$index1] . "<br>";
        break;
    } else {
        if ($dzielniki1[$index1] > $dzielniki2[$index2]) {
            $index1++;
        } else {
            $index2++;
        }
    }
}

$arr = ['krowa' => 'byk', 2 => 4, 3 => "cso"];
foreach ($arr as $ktos) {
    echo $ktos . "<br>";
}
foreach ($arr as $key=>$ktos) {
    echo $key." ".$ktos . "<br>";
}


$pierwsza=234567586;
$licznik=1;
for ($i = 2; $i <= $pierwsza || $licznik!=3; $i++) {
    if ($pierwsza%$i == 0) {
        $licznik++;
    }
}
if ($licznik==3) {
    echo "nie jest pierwsza";
}else{
    echo"jest pierwsza";
}

?>
</body>
</html>
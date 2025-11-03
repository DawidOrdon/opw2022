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
<pre>
<?php
    $file = fopen("users.txt", "r") or die("nie znaleziono pliku");
    echo filesize("users.txt")."<br />";
//    echo fread($file,filesize("users.txt"))."<br />";

    while (!feof($file)) {
        $linijka = explode(" ", fgets($file));
        print_r($linijka);
    }
    fclose($file);
    $file2 = fopen('dane.txt','a');
    fwrite($file2,'szkla na lesnej');
    fclose($file2);
?>
    </pre>
</body>
</html>
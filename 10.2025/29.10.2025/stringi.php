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
    $str="                     Witajciefas fasdf afdsa fds";
    echo strlen($str)."<br />";
    echo str_word_count($str)."<br />";
    echo strpos($str,'asdf')."<br />";
    echo strtoupper($str)."<br />";
    echo strtolower($str)."<br />";
    echo str_replace('asdf','chce kababa z tendura',$str)."<br />";
    var_dump($str);
    echo strrev($str)."<br />";
    $str = trim($str);
    var_dump($str);
    echo strlen($str)."<br />";
    print_r(explode('a',$str));
    echo substr($str,12,3)."<br />";

    ?>
</body>
</html>
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
    <form action="" method="post">
        <input type="text" name="imie" id="">
        <input type="submit" value="post">
    </form>
    <form action="" method="get">
        <input type="text" name="imie" id="">
        <input type="submit" value="get">
    </form>
    user 1
    <form action="" method="post">
        <input type="hidden" name="id">
        <input type="submit" value="edit">
    </form> <br />
    user 2 <a href="index.php/?id=2"><button>edit</button></a> <br />
    user 3 <button>edit</button> <br />
    user 4 <button>edit</button> <br />

    <?php
    if(isset($_POST['id'])){
        echo"isset";
        echo $_POST["id"];
    }
    if(!empty($_POST['id'])){
        echo"emptu";
        echo $_POST["id"];
    }
    ?>
</body>
</html>
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
<form action="dodaj_rase.php" method="post">
<input type="text" name="rasa">
<input type="submit" value="dodaj">
</form>
<table>


<?php
    $db = new mysqli('localhost', 'root', '', 'komisarjat');
    $sql="SeLECT * FROM rasa";
    $query=$db->prepare($sql);
    $query->execute();
    $result=$query->get_result();
    while ($row = $result->fetch_object()) {
        echo "<tr><td>$row->nazwa</td><td><a href='./delete_rasa.php?id={$row->rasa_id}'><button>usun</button></a></td><td><a href='./edit_rasa.php?id={$row->rasa_id}'><button>edytuj</button></a></td></tr>";
    }
?>
</table>
</body>
</html>
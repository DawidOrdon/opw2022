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
$db = new mysqli('localhost', 'root', '', 'komisarjat');
$sql="SeLECT * FROM rasa where rasa_id=?";
$query=$db->prepare($sql);
$query->bind_param('i', $_GET['id']);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_object();
?>
<form action="update_rasa.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row->rasa_id?>">
    <input type="text" name="rasa" value="<?php echo $row->nazwa?>">
    <input type="submit" value="edit">
</form>
</body>
</html>
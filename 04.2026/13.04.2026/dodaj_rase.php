<?php
if (!empty($_POST['rasa'])) {
    $db = new mysqli('localhost', 'root', '', 'komisarjat');
    $sql = "INSERT INTO komisarjat.rasa ( nazwa) VALUES ( ?);";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_POST['rasa']);
    $stmt->execute();
    header('Location: ./rasa.php');
}else{
    header('Location: ./rasa.php');
}
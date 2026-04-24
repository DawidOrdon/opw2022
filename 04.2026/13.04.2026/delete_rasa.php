<?php
if (!empty($_GET['id'])) {
    $db = new mysqli('localhost', 'root', '', 'komisarjat');
    $sql = "delete from rasa where rasa_id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $_GET['id']);
    $stmt->execute();
    header('Location: ./rasa.php');
}else{
    header('Location: ./rasa.php');
}
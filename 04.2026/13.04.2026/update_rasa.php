<?php
if (!empty($_POST['rasa'])) {
    $db = new mysqli('localhost', 'root', '', 'komisarjat');
    $sql = "UPDATE komisarjat.rasa t
SET 
    t.nazwa   = ?
WHERE t.rasa_id = ?;

";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('si', $_POST['rasa'],$_POST['id']);
    $stmt->execute();
    header('Location: ./rasa.php');
}else{
    header('Location: ./rasa.php');
}
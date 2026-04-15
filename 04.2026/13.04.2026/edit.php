<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');
$sql= "SELECT * FROM psy where pies_id = ?";
$query = $db->prepare($sql);
$query->bind_param('i', $_GET['id']);
$query->execute();
$result = $query->get_result();
var_dump($result->fetch_object());
?>
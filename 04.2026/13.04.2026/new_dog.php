<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');
$sql = "INSERT INTO komisarjat.psy (imie, rasa_id, waga, wzrost, data_narodzin, box_id) VALUES (?, ?, ?, ?, ?, ?);";
$query = $db->prepare($sql);
$query->bind_param('siddsi',$_POST['']);
$query->execute();
var_dump($_POST);
<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');
if(!empty($_POST['imie'])&&!empty($_POST['rasa'])&&!empty($_POST['waga'])&&is_numeric($_POST['waga'])&&!empty($_POST['wzrost'])&&is_numeric($_POST['wzrost'])&&!empty($_POST['box'])&&!empty($_POST['data'])){
    $sql = "INSERT INTO komisarjat.psy (imie, rasa_id, waga, wzrost, data_narodzin, box_id) VALUES (?, ?, ?, ?, ?, ?);";
    $query = $db->prepare($sql);
    $query->bind_param('siddsi',$_POST['imie'],$_POST['rasa'],$_POST['waga'],$_POST['wzrost'],$_POST['data'],$_POST['box']);
    $query->execute();
    var_dump($_POST);
    $_SESSION['message'] = "dodano psa";
    $_SESSION['type_message'] = "success";
    header('Location: index.php');
}else{
    $_SESSION['message'] = "podaj prawidlowe dane";
    $_SESSION['type_message'] = "error";
    header('Location: index.php');
}

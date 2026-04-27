<?php
header("Content-type: application/json; charset=utf-8");
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if($data===null){
    echo json_encode([
        "status" => "error",
        "message" => "Invalid JSON"
    ]);
    exit;
}
$imie = $data['imie']??"";

$db=new mysqli("localhost","root","","komisarjat");
$db->query("SET NAMES utf8");
$imie = "%".$imie."%";
$query = $db->prepare("SELECT * FROM psy where imie like ?");
$query->bind_param("s", $imie);
$query->execute();
$result = $query->get_result();
$dane = array();
while($row = $result->fetch_assoc()){
    $dane[] = $row;
}
echo json_encode($dane);
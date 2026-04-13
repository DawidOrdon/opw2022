<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');
var_dump($_POST);
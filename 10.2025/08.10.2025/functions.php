<?php
function connect()
{
    try{
        $db = new mysqli('localhost', 'root', '', 'opw20d22');
        $db->set_charset("utf8");
        return $db;
    }catch (Exception $e){
//        print $e->getMessage();
        echo "connection failed ".$e->getMessage();
        die();
        return false;
    }

}

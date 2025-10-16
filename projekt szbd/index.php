<?php
session_start();

    if(!empty($_POST['baza'])){
        unset($_SESSION['zapytanie']);
        unset($_SESSION['edit']);
        unset($_SESSION['newtable']);
        unset($_SESSION['del']);
        $_SESSION['baza'] = $_POST['baza'];
    }
    if(!empty($_POST['zapytanie'])){
        $_SESSION['zapytanie'] = $_POST['zapytanie'];
    }
    if(!empty($_POST['edit'])){
        $_SESSION['edit'] = $_POST['edit'];
    }
    if(isset($_SESSION['baza'])){
        //db po odczytaniu zmiennej odnosnie bazy ale przed 1 zapytaniem
        $db=new mysqli("localhost","root","",$_SESSION['baza']);
    }else{
        $db=new mysqli("localhost","root","");
    }
    if(!empty($_POST['newtable'])){
        $sql = "create table {$_POST['newtable']} (id int primary key auto_increment)";
        $query_new = $db->prepare($sql);
        $query_new->execute();
    }
    if(!empty($_GET['del'])){
        $sql = "drop table {$_GET['del']}";
        $query= $db->prepare($sql);
        $query->execute();
        header("Location: index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            background-color: #f1f1f1;
            height: 100vh !important;
            margin: 0;
            padding: 0;
            
        }
        .left, .tabele, .result{
            float: left;
            border-radius: 10px;
            background-color: #fafafa;
            margin: 10px;
            padding: 10px;
        }
        .bazy{
            overflow: auto;
            height: 90vh !important;
        }
        .result{
            padding: 1%;
            max-width: 60%;

        }
        button{
            width: 100%;
            background-color: transparent;
            padding: 4px;
            border-radius: 6px;
            border:1px solid black;
            cursor: pointer;
        }
        button:hover{
            background-color: #aaaaaa;
            color:white;
            border:1px solid #aaaaaa;
        }
        input[type='radio']{
            cursor: pointer;
        }
        .result_array td{
            width: 33%;
        }
        .result_array{
            width: 100%;
        }
        .kolumny{
            border-collapse: collapse;
            table
        }
        .kolumny td, .kolumny th{
            padding: 6px;
        }
        .kolumny tr:nth-child(even) {
            background-color: #f1f1f1;
        }

    </style>
</head>
<body>
<div class="left bazy">
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="2"><button>wybierz baze</button></td>
            </tr>

    <?php

        $sql='show databases';
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->get_result();

        while($row=$result->fetch_array()){
            echo "<tr>
                        <td>
                            <input type='radio' name='baza' id='{$row[0]}' value='{$row[0]}'>
                        </td>
                        <td>
                        <label for='{$row[0]}'>{$row[0]}
                        </td>
                    </tr>";
        }
        ?>
        </table>
    </form>
</div>
        <?php
    if(isset($_SESSION['baza'])) {
        echo"<div class='tabele'>";
        echo"tabele dla bazy: {$_SESSION['baza']} <br />";
        echo"<form method='post'>
                <input type='text' name='newtable' placeholder='nazwa tabeli' style='width: 96% '>
                <button>dodaj</button>
            </form>";
        $db=new mysqli("localhost","root","",$_SESSION['baza']);
        $sql='show tables';
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->get_result();
        echo"<table class='result_array'>";
        while($row=$result->fetch_array()){
            echo "<tr><td>$row[0]</td><td><form method='post'><input type='hidden' name='edit' value='$row[0]'><button>edit</button></form></td><td><a href='?del=$row[0]'><button>del</button></a></td></tr>";
        }
        echo"</table>";
        //kolumny w tabeli
        if(isset($_SESSION['edit'])){
            $sql='show columns from '.$_SESSION['edit'];
            $query=$db->prepare($sql);
            $query->execute();
            $result=$query->get_result();
            echo "<form method='post'>
                    <table>
                        <tr>
                            <th>nazwa kolumny</th>
                            <th>typ danych</th>
                            <th>null</th>
                            <th>klucz</th>
                            <th>domyslna</th>
                            <th>a_i</th>
                        </tr>
                        <tr>
                            <td><input type='text' name='nazwa' id=''></td>
                            <td>
                                <select name='typ' id=''>
                                    <option value='text'>text</option>
                                    <option value='int'>int</option>
                                    <option value='float'>float</option>
                                </select>
                            </td>
                            <td>
                                <input type='checkbox' name='null' >
                            </td>
                            <td>
                                <select name='key' id=''>
                                    <option></option>
                                    <option value='primary'>primary</option>
                                    <option value='secondary'>secondary</option>
                                    <option value='float'>float</option>
                                </select>
                            </td>
                            <td>
                                <input type='text' name='default' id=''>      
                            </td>
                            <td>
                                <input type='checkbox' name='ai' id=''>
                            </td>
                            <td>
                                <button>dodaj</button>
                            </td>
                            
                        </tr>
                        
                        
                        
                    </table>
                    
                </form>";
            echo"<table class='kolumny'>
                    <tr>
                        <th>nazwa</th>
                        <th>typ</th>
                        <th>czy null</th>
                        <th>klucz</th>
                        <th>wartosc domyslna</th>
                        <th>dodatkowe informacje</th>
                    </tr>";
            echo"<pre>";
            while($row=$result->fetch_object()){
                echo"<tr>
                        <td>$row->Field</td>
                        <td>$row->Type</td>
                        <td>".($row->Null=='NO'?'NIE':'TAK')."</td>
                        <td>".($row->Key=='PRI'?'główny':($row->Key=='SEC'?'obcy':''))."</td>
                        <td>$row->Default</td>
                        <td>$row->Extra</td>
                    </tr>";
//                print_r($row);
            }
            echo"</pre>";
            echo"</table>";
        }
        echo"</div>";
        ?>

        <div class="form result">
            <form method='post'>
                <textarea name='zapytanie' style="padding: 5px; min-width: 150px"></textarea> <br />
                <button>wyslij zapytanie</button>
            </form>
            <?php
//            wysylanie zapytan
            try{
                if(!empty($_SESSION['zapytanie'])) {
                    $sql = $_SESSION['zapytanie'];
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->get_result();
//                    print_r($result);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "<table><tr>";
                        foreach ($row as $key => $value) {
                            echo "<th>{$key}</th>";
                        }
                        echo "</tr><tr>";
                        foreach ($row as $key => $value) {
                            echo "<td>{$value}</td>";
                        }
                        echo "</tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $key => $value) {
                                echo "<td>{$value}</td>";
                            }
                            echo "</tr>";
                        }
                    }


            ?>
            <div>

            </div>
            <?php
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }
            ?>
        </div>
        <?php
    }

?>


</body>
</html>
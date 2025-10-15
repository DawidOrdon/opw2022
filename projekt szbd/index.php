<?php
session_start();
    if(!empty($_POST['baza'])){
        $_SESSION['baza'] = $_POST['baza'];
    }
    if(!empty($_POST['zapytanie'])){
        $_SESSION['zapytanie'] = $_POST['zapytanie'];
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
        while($row=$result->fetch_array()){
            echo $row[0]."<br />";
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
<?php
session_start();
    if(!empty($_POST['baza'])){
        $_SESSION['baza'] = $_POST['baza'];
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
        .form, .tabele{
            display: block;
            float: left;
            margin-right: 20px;
        }

    </style>
</head>
<body>
<form action="" method="post" class="form">
    <table>
        <tr>
            <td colspan="2"><input type="submit" value="wybierz baze" ></td>
        </tr>

<?php
    $db=new mysqli("localhost","root","","mysql");
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
    echo "</table></form>";
    if(isset($_SESSION['baza'])) {
        echo"<div class='tabele'>";
        echo"tabele dla bazy: {$_SESSION['baza']} <br />";
        $db=new mysqli("localhost","root","",$_SESSION['baza']);
        $sql='show tables';
        $query=$db->prepare($sql);
        $query->execute();
        $result=$query->get_result();
        while($row=$result->fetch_array()){
            echo $row[0]."<br />";
        }
        echo"</div>";
        echo"<form method='post' class='form'>";
        echo"<textarea name='zapytanie'></textarea> <br />";
        echo"<input type='submit' value='wyslij zapytanie'>";
        echo"</div>";
    }

?>


</body>
</html>
<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>komisarjat</title>
    <style>
        input{
            width: 200px;
        }
        select{
            width: 208px;
        }
    </style>
</head>
<body>
<form action="./new_dog.php" method="post">
    <table>
        <tr>
            <td><label for="imie">Imie psa:</label></td>
            <td><input type="text" name="imie" id="imie"></td>
        </tr>
        <tr>
            <td><label for="rasa">Rasa psa:</label></td>
            <td><select name="rasa" id="rasa">
                    <?php
                        $sql = "SELECT * FROM `rasa`";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->get_result();
                        while($row = $result->fetch_object()) {
                            echo "<option value='" . $row->rasa_id . "'>" . $row->nazwa . "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="waga">Waga psa:</label></td>
            <td><input type="number" name="waga" step="0.01" id="waga"></td>
        </tr>
        <tr>
            <td><label for="wzrost">Wzrost psa:</label></td>
            <td><input type="number" name="wzrost" step="0.01" id="wzrost"></td>
        </tr>
        <tr>
            <td><label for="box">Box</label></td>
            <td><select name="box" id="box">
                    <?php
                        $sql = "SELECT * FROM boxy where wolne>0";
                        $query = $db->prepare($sql);
                        $query->execute();
                        $result = $query->get_result();
                        while ($row = $result->fetch_object()) {
                            echo "<option value='" . $row->box_id . "'>" . $row->typ . " max:{$row->max_wielkosc} wolne:{$row->wolne}</option>";
                        }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="dodaj psa" style="width: 100%"></td>
        </tr>
    </table>
</form>
</body>
</html>
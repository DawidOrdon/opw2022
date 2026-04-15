<?php
session_start();
$db = new mysqli('localhost', 'root', '', 'komisarjat');
$sql= "SELECT * FROM psy where pies_id = ?";
$query = $db->prepare($sql);
$query->bind_param('i', $_GET['id']);
$query->execute();
$result = $query->get_result();
$row = $result->fetch_object();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="./new_dog.php" method="post">
    <table>
        <tr>
            <td><label for="imie">Imie psa:</label></td>
            <td><input type="text" name="imie" id="imie" value="<?php echo $row->imie ?>"></td>
        </tr>
        <tr>
            <td><label for="rasa">Rasa psa:</label></td>
            <td><select name="rasa" id="rasa">
                    <?php
                    $sql = "SELECT * FROM `rasa`";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->get_result();
                    while($row2 = $result->fetch_object()) {
                        $selected = $row->rasa_id == $row2->rasa_id?"selected":"";
                        echo "<option value='" . $row2->rasa_id . "' $selected>" . $row2->nazwa . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="waga">Waga psa:</label></td>
            <td><input type="number" name="waga" step="0.01" id="waga" value="<?php echo $row->waga ?>"></td>
        </tr>
        <tr>
            <td><label for="wzrost">Wzrost psa:</label></td>
            <td><input type="number" name="wzrost" step="0.01" id="wzrost" value="<?php echo $row->wzrost ?>"></td>
        </tr>
        <tr>
            <td><label for="data">Data narodzin psa:</label></td>
            <td><input type="date" name="data" step="0.01" id="data" value="<?php echo $row->data_narodzin ?>"></td>
        </tr>
        <tr>
            <td><label for="box">Box</label></td>
            <td><select name="box" id="box">
                    <?php
                    $sql = "SELECT * FROM boxy where wolne>0";
                    $query = $db->prepare($sql);
                    $query->execute();
                    $result = $query->get_result();
                    while ($row2 = $result->fetch_object()) {
                        $selected = $row->box_id == $row2->box_id ? "selected" : "";
                        echo "<option value='" . $row2->box_id . "' $selected>" . $row2->typ . " max:{$row2->max_wielkosc} wolne:{$row2->wolne}</option>";
                    }
                    ?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="dodaj psa" style="width: 100%"></td>
        </tr>
        <?php
        if(isset($_SESSION['message'])) {
            if ($_SESSION['type_message'] == "error") {
                $color = 'red';
            } else if ($_SESSION['type_message'] == "success") {
                $color = 'green';
            }
            echo "<tr>
                        <td colspan='2' style='color: {$color}'>{$_SESSION['message']}</td>
                    </tr>";
            unset($_SESSION['message']);
        }
        ?>
    </table>
</form>
</body>
</html>

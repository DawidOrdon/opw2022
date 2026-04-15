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
        td, th{
            border:1px solid black;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<form action="./new_dog.php" method="post">
    <table>
        <tr>
            <td><label for="imie">Imie psa:</label></td>
            <td><input type="text" name="imie" id="imie" value="<?php echo isset($_SESSION['imie'])?$_SESSION['imie'] : " " ?>"></td>
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
                            $selected = $_SESSION['rasa'] == $row->rasa_id?"selected":"";
                            echo "<option value='" . $row->rasa_id . "' $selected>" . $row->nazwa . "</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="waga">Waga psa:</label></td>
            <td><input type="number" name="waga" step="0.01" id="waga" value="<?php echo isset($_SESSION['waga'])?$_SESSION['waga'] : " " ?>"></td>
        </tr>
        <tr>
            <td><label for="wzrost">Wzrost psa:</label></td>
            <td><input type="number" name="wzrost" step="0.01" id="wzrost" value="<?php echo isset($_SESSION['wzrost'])?$_SESSION['wzrost'] : " " ?>"></td>
        </tr>
        <tr>
            <td><label for="data">Data narodzin psa:</label></td>
            <td><input type="date" name="data" step="0.01" id="data" value="<?php echo isset($_SESSION['data'])?$_SESSION['data'] : " " ?>"></td>
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
                            $selected = $_SESSION['box'] == $row->box_id ? "selected" : "";
                            echo "<option value='" . $row->box_id . "' $selected>" . $row->typ . " max:{$row->max_wielkosc} wolne:{$row->wolne}</option>";
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
<table>
    <tr>
        <th>id</th>
        <th>imie</th>
        <th>rasa</th>
        <th>waga</th>
        <th>wzrost</th>
        <th>narodziny</th>
        <th>box</th>
        <th>usun</th>
    </tr>
<?php
    $sql = "select p.pies_id as id, p.imie as imie, p.waga as waga, p.wzrost as wzrost, p.data_narodzin as narodziny,  b.typ as box_typ, b.max_wielkosc as wielkosc, b.wolne as wolne, r.nazwa as rasa from psy as p join rasa as r on p.rasa_id = r.rasa_id join boxy as b on p.box_id = b.box_id order by p.pies_id";
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_object()){
        echo "<tr>";
        echo "<td>{$row->id}</td>";
        echo "<td>{$row->imie}</td>";
        echo "<td>{$row->rasa}</td>";
        echo "<td>{$row->waga}</td>";
        echo "<td>{$row->wzrost}</td>";
        echo "<td>{$row->narodziny}</td>";
        echo "<td>{$row->box_typ} max:{$row->wielkosc} wolne:{$row->wolne}</td>";
        echo "<td><a href='delete.php?id={$row->id}'><button>usuń</button></a></td>";
        echo "</tr>";
    }



?>
</table>
</body>
</html>
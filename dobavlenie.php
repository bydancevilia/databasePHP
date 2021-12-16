<?php
require_once 'connect.php';
?>
<form action="dobavlenie.php" method="GET">
<br>
Адрес помещения: <input type="text" name="Adres"><br><br>
Количество комнат: <input type="text" name="Komnati"><br><br>
Этаж: <input type="text" name="Etag"><br><br>
Балкон: <input type="text" name="Balkon"><br><br>
Стоимость в сутки: <input type="text" name="Stoimost"><br><br>
Владелец: <select name="Vladelec">
<?php
$result=mysqli_query($link,"SELECT
  vladelec.id_vladelec,
  vladelec.Last_Name
FROM dogofor
  INNER JOIN client
    ON dogofor.id_client = client.id_client
  INNER JOIN pomeshenie
    ON dogofor.id_pomeshenia = pomeshenie.id_pomeshenia
  INNER JOIN vladelec
    ON pomeshenie.id_vladelec = vladelec.id_vladelec");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
 foreach($rows as $row)
{
        echo"<option>".($row ['id_vladelec']."<br>");

}
?>
</select><br><br>
<input type="submit" name="submit" value="Добавить"><br><br>
<a href="osnova.php">Назад</a><br><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"INSERT HIGH_PRIORITY INTO   pomeshenie (id_pomeshenia, `kol-vo komnat`, adres, etag, balkon, id_vladelec, `stoimost za sutki`)
  VALUES (0, $_GET[Komnati], '$_GET[Adres]', $_GET[Etag], '$_GET[Balkon]', $_GET[Vladelec], $_GET[Stoimost]); ");
}
?>
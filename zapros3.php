<?php
require_once 'connect.php';
?>
<form action="zapros3.php" method="GET">
Количество комнат:<input type="text" name="kolvo_komnat"><br><br>
<input type="submit" name="submit" value="Поиск"><br>
<a href="osnova.php">Назад</a><br><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  vladelec.Last_Name,
  pomeshenie.adres,
  vladelec.nomer_telephona
FROM dogofor
  INNER JOIN client
    ON dogofor.id_client = client.id_client
  INNER JOIN pomeshenie
    ON dogofor.id_pomeshenia = pomeshenie.id_pomeshenia
  INNER JOIN vladelec
    ON pomeshenie.id_vladelec = vladelec.id_vladelec
WHERE pomeshenie.`kol-vo komnat` = '$_GET[kolvo_komnat]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<table border="3">';
echo '<tr>';
echo '<th>'."Адрес".'</th>';
echo '<th>'."Фамилия владельца".'</th>';
echo '<th>'."Номер телефона владельца".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	echo '<tr>';
	echo '<td>'.$row['adres'].'</td>';
        echo '<td>'.$row['Last_Name'].'</td>';
        echo '<td>'.$row['nomer_telephona'].'</td>';
	echo '</tr>';	
}

}
echo '</table>';

?>
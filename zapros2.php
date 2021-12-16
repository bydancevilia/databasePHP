<?php
require_once 'connect.php';
?>
<form action="zapros2.php" method="GET">
Владелец: <select name="Vladelec">
<?php
$result=mysqli_query($link,"SELECT
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
        echo"<option>".($row ['Last_Name']."<br>");
}
?>
</select>
<br><br>
<input type="submit" name="submit" value="Поиск"><br><br>
<a href="osnova.php">Назад</a><br><br><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  pomeshenie.`kol-vo komnat`,
  pomeshenie.adres,
  pomeshenie.etag,
  pomeshenie.balkon,
  vladelec.Name,
  vladelec.Last_Name,
  vladelec.nomer_telephona
FROM dogofor
  INNER JOIN client
    ON dogofor.id_client = client.id_client
  INNER JOIN pomeshenie
    ON dogofor.id_pomeshenia = pomeshenie.id_pomeshenia
  INNER JOIN vladelec
    ON pomeshenie.id_vladelec = vladelec.id_vladelec
WHERE vladelec.Last_Name = '$_GET[Vladelec]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	 echo "<b>Имя: </b>";
        print($row['Name']."<br>");
		 echo "<b>Фамилия: </b>";
        print($row['Last_Name']."<br>");
		 echo "<b>Номер: </b>";
        print($row['nomer_telephona']."<br>");
		 echo "<b>Сдает квартиру по адресу: </b>";
        print($row['adres']."<br>");
}

}

?>
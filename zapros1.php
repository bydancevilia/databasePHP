<?php
require_once 'connect.php';
?>
<form action="zapros1.php" method="GET">
Фамилия владельца помещения:<input type="text" name="NameAuthor"><br><br>
<input type="submit" name="submit" value="Поиск"><br>
<a href="osnova.php">Назад</a><br><br>
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
WHERE vladelec.Last_Name = '$_GET[NameAuthor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
        print($row['Name']."<br>");
        print($row['Last_Name']."<br>");
        print($row['nomer_telephona']."<br>");
        print($row['adres']."<br>");
}

}

?>
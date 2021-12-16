<?php
require_once 'connect.php';
?>
<form action="zapros1.php" method="GET">
Этаж помещения: <input type="text" name="NameAuthor"><br><br>
<input type="submit" name="submit" value="Поиск"><br><br>
<a href="osnova.php">Назад</a><br><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  pomeshenie.`kol-vo komnat`,
  pomeshenie.adres,
  pomeshenie.etag,
  pomeshenie.`stoimost za sutki`
FROM pomeshenie
WHERE pomeshenie.etag ='$_GET[NameAuthor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
 echo "<b>Этаж: </b>";
		print($row ['etag']."<br>");
 echo "<b>Количество комнат: </b>";
        print($row ['kol-vo komnat']."<br>");
 echo "<b>Стоимость за сутки: </b>";
        print($row ['stoimost za sutki']."<br>");
 echo "<b>Адрес: </b>";
        print($row ['adres']."<br><br>");
}

}

?>
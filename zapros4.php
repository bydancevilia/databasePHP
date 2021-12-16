<?php
require_once 'connect.php';
?>
<form action="zapros4.php" method="GET">
Владелец: <select name="adresok">
<?php
$result=mysqli_query($link,"SELECT
  pomeshenie.adres
FROM pomeshenie");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
 foreach($rows as $row)
{
        echo"<option>".($row ['adres']."<br>");
}
?>
</select>
<input type="submit" name="submit" value="Удалить"><br><br>
<a href="osnova.php">Назад</a><br><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"DELETE FROM pomeshenie WHERE adres = '$_GET[adresok]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);

}


?>
<!--找出園區內對應的所有動物-->
<?php session_start(); ?>



<?php

unset($_SESSION["A_Name_En"]);

//連接資料庫
$link = mysqli_connect("localhost", "06171014", "06171014", "06171014") or die("無法建立資料連接");
mysqli_query($link , "SET NAMES UTF8;");
echo $_GET["stateName"];
$_SESSION["stateName"] = $_GET["stateName"];

$str = 'SELECT DISTINCT Name_Ch FROM '.$_GET["stateName"].";";

echo "<br>".$str;
$result = mysqli_query($link, $str);
$countItem=0;

//多加測站，測試是否有連動
$itemName[$countItem] = $_GET["stateName"];
$countItem=$countItem+1; 


while ($row = mysqli_fetch_row($result))
{
  echo $row[0]."<br>";	
  $itemName[$countItem] = $row[0];
  $countItem=$countItem+1;
}

$_SESSION["Name_Ch"]=$itemName;

mysqli_free_result($result);
mysqli_close($link);

header("location:Menu.php");
?>



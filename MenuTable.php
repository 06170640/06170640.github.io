<?php
//require("connectLogin.php");
$link = mysqli_connect("localhost", "06171014", "06171014", "06171014") or die("無法建立資料連接");
mysqli_query($link ,"SET NAMES UTF8;");
$str = 'SHOW TABLES 
      WHERE Tables_in_06171014 NOT LIKE "t%"
       AND Tables_in_06171014 NOT LIKE "b%";';

$result = mysqli_query($link, $str);
$count=0;

while ($row = mysqli_fetch_row($result))
{
  $tbName[$count] = $row[0];
  $board[$count] = $row[0];
  $count=$count+1;
}

mysqli_free_result($result);
mysqli_close($link);
?>



  
  
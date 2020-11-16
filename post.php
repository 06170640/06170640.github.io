<?php
require_once("dbtools.inc.php");

$StudentID = $_POST["StudentID"];
$content = $_POST["content"];
$current_time = date("Y-m-d H:i:s");

//建立資料連接
$link = create_connection();

//執行SQL查詢
$sql = "INSERT INTO board(StudentID, content, date)
          VALUES('$StudentID', '$content', '$current_time')";
$result = execute_sql($link, "06171014", $sql);

//關閉資料連接
mysqli_close($link);

//將網頁重新導向到G08-zoo.php
header("location:message_board.php");
exit();
?>
<!doctype html>
  <html>
  <head>
  <meta charset="utf-8">
  <title>留言板</title>

<style>
body{
background-image: url( ' ./圖片/plant.png ' );
background-color:#f33658A;
background-size: 100% auto ;
}  
             
input[type=text] {
  width: 80%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #ffffff;
  color: green;
  border-radius: 12px
} 

textarea  {
  padding: 12px 25px;
  width: 400px;
  height:150px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none;
  background-color: #ffffff;
  color: green;
  border-radius: 12px
} 
             
             
td:first-child{
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

td:last-child{
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}
  </style>


  
<!--判斷瀏覽者有沒有輸入留言-->


<script type="text/javascript">
  function check_data()
{
  if (document.myForm.StudentID.value.length == 0)
    alert("請輸入學號!");
  else if (document.myForm.content.value.length == 0)
    alert("說點甚麼內容吧?別空白阿");
  else
    myForm.submit();
  }
</script>

</head>




<br><br><br>


<!--留言板表單的部分-->
 <form name="myForm" method="post" action="post.php">
  <table border="0"  align="center" cellspacing="0"  style="border-radius: 12px;"  >
  
  <tr bgcolor="#b3c0a4" align="center">
  <td colspan="2">
  <font size='5' color="#ffffff"><b>請在此輸入新的留言</font></td>
  </tr>
  
  <tr bgcolor="#eaefd3"width="800"  height="40" >
  <td width="15%"><center><font size="5" color="#666600"><b>學號</td>
  <td width="85%"><input name="StudentID" type="text" size="50"></td>
  </tr>
  
&emsp;&emsp;&emsp;
    <tr bgcolor="#eaefd3"width="800"   height="5">
  <tr bgcolor="#eaefd3"width="800"   height="200">
  
  <td width="15%"><center><font size="5"  color="#666600"><b>內容</td>
  <td width="85%"><center><textarea name="content" cols="50" rows="5" type="text"></textarea></td>
  </tr>
 
  <tr bgcolor="#b3c0a4">
  <td colspan="2" align="center">
  <input type="button" value="張貼留言" onClick="check_data()"  
         style="width:120px;height:40px;border:2px #E6EFE9 double ;background-color:#DBD8AE; border-radius: 12px;">　
  <input type="reset" value="重新輸入" 
         style=";width:120px;height:40px;border:2px #E6EFE9 double ;background-color:#DBD8AE;border-radius: 12px;">
  </td>
  </tr>
  </table>
  </form>


<br><br><br><br><br>

<!--表單執行php-->
  <?php
require_once("dbtools.inc.php");

//指定每頁顯示幾筆記錄
$records_per_page = 5;

//取得要顯示第幾頁的記錄
if (isset($_GET["page"]))
  $page = $_GET["page"];
else
  $page = 1;

//建立資料連接
$link = create_connection();

//執行 SQL 命令
$sql = "SELECT * FROM board ORDER BY date DESC";	
$result = execute_sql($link, "06171014", $sql);

//取得記錄數
$total_records = mysqli_num_rows($result);

//計算總頁數
$total_pages = ceil($total_records / $records_per_page);

//計算本頁第一筆記錄的序號
$started_record = $records_per_page * ($page - 1);

//將記錄指標移至本頁第一筆記錄的序號
mysqli_data_seek($result, $started_record);

//使用 $bg 陣列來儲存表格背景色彩
$bg[0] = "#C8D5B9";
$bg[1] = "#F3E9D2";
$bg[2] = "#C8D5B9";
$bg[3] = "#F3E9D2";
$bg[4] = "#C8D5B9";

echo "<table width='800' align='center' cellspacing='3' >";

//顯示記錄
$j = 1;
while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
{
  echo "<tr bgcolor='" . $bg[$j - 1] . "'>";

  echo "<td>學號：" . $row["StudentID"] . "<br>";
  echo "發布時間：" . $row["date"] . "<hr>";
  echo $row["content"] . "</td></tr>";
  $j++;
}
echo "</table>" ;

//產生導覽列
echo "<b>". "<font size='5' face='Verdana'>". "<p style='color:	#9ACD32'size='8' align='center'>" ;

if ($page > 1)
  echo "<a href='message_board.php?page=". ($page - 1) . "'>上一頁</a> ";

for ($i = 1; $i <= $total_pages; $i++)
{
  if ($i == $page)
    echo "$i ";
  else
    echo "<a href='message_board.php?page=$i'>$i</a> ";
}

if ($page < $total_pages)
  echo "<a href='message_board.php?page=". ($page + 1) . "'>下一頁</a> ";
echo "</p>";

//釋放記憶體空間
mysqli_free_result($result);
mysqli_close($link);
?>
  

  </html>
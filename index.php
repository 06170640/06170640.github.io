<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title> 登入 </title>
</head>	

<style>
.container{
    margin:auto;
    background-color:#FAFABE;
    width:800px;
    padding-bottom: 20px;
  }
  
.top {
    font-family:微軟正黑體;
    text-align:center;
    padding:6px;
    background-color:white; 
    stlwidth:100% ;
    height:50%;
}

.box {
margin-top:100px;
} 

.box1 {
   width:23.5%;
   background: #ccc;
   padding:10px;
   border:2px solid #666;
   border-radius: 33px 33px 33px 33px;
   background:rgba(255,255,255,0.72)
}

.box2 {
   width:40%;
   padding:5px;
   border:0px solid #666;
   border-radius: 18px 18px 18px 18px;
   background:rgba(255,255,180,0.8)
}

body{
margin:0px;
padding:0px;
background:#fff url("./圖片/Q1.jpg") center fixed;
background-size: 100% auto ; 

} 

<!--按鈕C-->
input{border:0;
  background-color:#003C9D;
  color:#fff;
  border-radius:10px;
  cursor:pointer;}

input:hover{
  color:#003C9D;
  background-color:#fff;
  border:2px #003C9D solid;
}
      
</style>
    
    
    


    
    
    
    <?php
  setcookie("info", "");
  ?>
    
    <script>
    //alert("錯誤訊息");
  //alert("<? echo $_COOKIE['info']?>");
  
  var info = "<?php echo $_COOKIE['info'] ?>"
  if (info.length>0) alert(info);
  </script>
    
    <?php setcookie("info","");   ?>
    
    
    


 
   
<div class="box"> <center>

<div class="box2">
<font face="微軟正黑體"size="6"> <b> 臺北動物園導覽登入系統 </b> </font>
</div>

<br><br><br>
  
<div class="box1"> 
  <center>    
  <form method="post" action="check.php">
    <font face="微軟正黑體" size="2.5"> <b> <br>
    帳號 &nbsp; <input type="text" name="username"> <br><br>
    密碼 &nbsp; <input type="password" name="passwd"> <br>
    </b>
    </font> <br>
  </center> 
</div>
  
<br>

<input name="submit" type="submit"   
style="width:80px;height:30px;font-size:12px;border-radius: 12px" value ="登入"> <br><br>

  </form>

<font face="微軟正黑體" size="3.5"> 
<b> 帳號與密碼都是自己學號 </b> 
</font>

</center>
</div>

</body>
</html>
    
    
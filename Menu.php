
<?php session_start(); ?>  
<html>

  
  <head>
    <meta charset="UTF-8">
    <title> 動物百科全網 </title>
    

<!---------------------------------------css----------------------------------------------------------->       
 <style>

	  
	 body{
           margin:0px;
           padding:0px;
           background:#fff url("./圖片/1650_list.jpg") center fixed;
           background-size: 100% auto ; 

             } 
             


/*選擇框*/
   select{  /*文字*/
           font-family:微軟正黑體  ;       /*font-family 可以設定一種字體或多種不同的字體 
                                         sans-serif ( 無襯線體 )、serif ( 襯線體 )、monospace ( 等寬體 )、
                                         ursive ( 手寫體 ) 和 fantasy ( 幻想體 )*/
           font-size:30px;             /*字體大小*/
          
           color:#895B1E; 
           
           /*大小*/
           width:300px; 
           height:AUTO;  
           
           /*選擇框*/
           border-style: groove; /*選擇框樣式dotted -定義虛線邊框   dashed -定義虛線邊框
                可分別定義 (上 右 下  左 )                       solid -定義實線邊框      double -定義一個雙邊框
                                                                groove-定義3D溝槽邊框。效果取決於邊框顏色值
                                                                ridge-定義3D棱形邊框。效果取決於邊框顏色值
                                                                inset-定義3D嵌入邊框。效果取決於邊框顏色值
                                                                outset-定義3D起始邊框。效果取決於邊框顏色值
                                                                none -沒有邊界      hidden -定義一個隱藏的邊框 */
           border-width: 12px;/*選擇框粗細*/
           border-color: #DBD8AE;/*選擇框顏色*/
            border-radius:10px; /*角度*/
           /*背景顏色*/
           background-color:#EAF4D3;
           background-opacity:0.;
           padding-right: 2px;/*在邊框內留白*/    
           
          }
    






/*顯示選擇區塊*/

.large1 {
  background-color: #E9C46A;
  font-family:微軟正黑體;
  font-size: 20pt;
   padding:30px;//與內文的距離
   margin-bottom:10px;
   width:600px;//寬度
　 height:20px;//高度
   float:left;
   border-radius:0%; /*區塊角度*/
   font-color:white;
}

.large2 {
  background-color:	#BF211E;
  font-family:微軟正黑體;
  font-size: 20pt;
   padding:30px;//與內文的距離
   margin-bottom:10px;
   width:600px;//寬度
　 height:20px;//高度
   //float:left;
   border-radius:0%;/*區塊角度*/
   
}



hr.style-one {
    border: 0;
    height: 0; /* Firefox... */
    box-shadow: 0 0 10px 1px black;
}





/* 透明漸變 - color - transparent */

hr.style-two {
    border: 0;
    height: 1px;
    background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0));
}
  </style>
        
        
        
        
        
        
<!----------------------------------連接php---------------------------------------------------------------->           
    

<?php session_start(); ?>   <!--啟用session-->
<html>
  
<head>
    <meta charset="UTF-8">  <!--提供網頁內容的資訊給瀏覽器或是搜尋引擎-->
    <title> 動物資料庫 </title>
    
    <!-- 找出目前有哪些動物區域 -->
    <?php  require("MenuTable.php"); ?>	 <!-require 用來引入一個 PHP 檔案。-->
    
    
    
    <!-- 找出某區域有哪些動物 -->
    <script>                  <!--script 元素能嵌入或引用要執行的程式碼-->
    function level2(){ <!--function宣告函式 命名為level2 -->
      var stSelected = document.getElementById("stName").value <!--document.getElementById ，用來取得頁面中特定 id 的元素值 放入stSelected -->
      this.location="Menufind.php?"+"stateName="+stSelected;    <!--document.getElementById ，用來取得頁面中特定 id 的元素值 放入stSelected -->  
    }
    </script>
</head>

  
  
  
<!----------------------------------搜尋動物引擎---------------------------------------------------------------->    


<body background="./123.jpg">
<h1> <center> <font face="微軟正黑體"size="10"><u> 動物資料查詢系統 </u></font> </center> </h1> <br>
<h3>


<!----------------------------------php1---------------------------------------------------------------->     

    
<form method="post">
<center><font face="微軟正黑體"size="6">選擇區域</font><br><br>



      <select name="stateName" id="stName" onChange="level2();">
      <?php 
      for ($i=0;$i<$count;$i++){
        if ($tbName[$i]==$_SESSION["stateName"]) {
          echo "<option"." value=".$tbName[$i]." SELECTED>"; 
        }else {
          echo "<option"." value=".$tbName[$i].">"; 
        }
        echo $tbName[$i]; 
        echo "</option>";
      }
      ?>
        </select></center><br><br>
        
        
<!----------------------------------php2---------------------------------------------------------------->           
<center><font face="微軟正黑體"size="6">選擇動物</font><br><br>
        <select name="itemName[]" multiple >
          <?php 
        for ($i=1;$i<count($_SESSION["Name_Ch"]);$i++){              //設定一個變數$i並給初始值1，每次執行完成一次 for 迴圈內容，就會先執行 $i++，也就是變數 $i+1 的意思， 當i的數值= count($_SESSION["Name_Ch"]並跳出迴圈
                                                                          // 然後再重複進行這樣的比對，以此類推執行到 最後一欄 的時候，for 迴圈就會停止
          echo "<option>"; 
          echo $_SESSION["Name_Ch"][$i]; 
          echo "</option>";
        }                    
        ?>
          </select><br><br>
          
          <input name="submit" type="submit" value="送出" 
            style="border-radius:30%;
                   font-size:15pt; 
                   width:90px; 
                   height:40px; 
                   font-weight:bold;
                   background-color:	#FDFFFF; "></center>
          <hr class="style-two  size="5px" width="50%" style= "background-color:	#CDCD9A; border:1px dashed #0000fff;">
</form>
       
       
            
<!-------------------------------------------------------------------------------------------------->             
           
            
            
            
<!--顯示查詢的結果-->  



<center>

 <span style="background-color:	#FFDEAD;margin-right:5px;"><font face="微軟正黑體"size="6">動物資訊</span></font><br><br>
 

<?php
            //選擇的資訊
            
            
            
            if (isset($_POST["stateName"]) AND isset($_POST["itemName"])){
            //echo "<hr>";
            
         
            
            
            echo "<div class=large1  style='color:white;'><center>--您選擇的區域--<br><br>".$_POST["stateName"]."<br><br></center></div >";
             ?>
             
             
             <hr class="style-one  size="5px" width="20%" style= "background-color:	#CDCD9A; border:1px dashed #0000fff;">
             
            <div class=large2 style='color:white;'> <h3>--您選擇的動物--</h3>
            <?php
            
            
            
            for ($i=0;$i<count($_POST["itemName"]);$i++){
            
            echo "<center>".$_POST["itemName"][$i]."</center>";
             
            }
            ?>
          </div>
            
             <?php
            
            $link = mysqli_connect("localhost", "06171014", "06171014", "06171014") or die("無法建立資料連接");
            mysqli_query($link, "set names 'utf8';");
            
            
            // 設計sql查詢語法(查詢動物相關資料)
          $str1 = 'SELECT  `Name_Ch` AS 動物名稱
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";
                  
          $str2 = 'SELECT  `A_Distribution` AS 出沒地 
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";
                  
          $str3 = 'SELECT  `A_Habitat`AS 棲息地分布 
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";
                  
          $str4 = 'SELECT  `A_Feature` AS 特徵 
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";
                  
          $str5 = 'SELECT  `A_Behavior` AS 習性
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('"; 
                  
          $str6 = 'SELECT   `A_Diet` AS 主食
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";
                  
          $str7 = 'SELECT  `A_Pic01_URL`as 圖片網址 
                  FROM '.$_POST["stateName"]." WHERE Name_Ch IN ('";        
            for ($i=0;$i<(count($_POST["itemName"])-1);$i++){      
            $str1 = $str1.$_POST["itemName"][$i]."', '"; 
             $str2 = $str2.$_POST["itemName"][$i]."', '";
              $str3 = $str3.$_POST["itemName"][$i]."', '";
               $str4 = $str4.$_POST["itemName"][$i]."', '";
                $str5 = $str5.$_POST["itemName"][$i]."', '";
                 $str6 = $str6.$_POST["itemName"][$i]."', '";
                  $str7 = $str7.$_POST["itemName"][$i]."', '";
            
          
           
          }

          $str1 = $str1.$_POST["itemName"][$i]."') LIMIT 10;";
          $str2 = $str2.$_POST["itemName"][$i]."') LIMIT 10;";
          $str3 = $str3.$_POST["itemName"][$i]."') LIMIT 10;";
          $str4 = $str4.$_POST["itemName"][$i]."') LIMIT 10;";
          $str5 = $str5.$_POST["itemName"][$i]."') LIMIT 10;";
          $str6 = $str6.$_POST["itemName"][$i]."') LIMIT 10;";
          $str7 = $str7.$_POST["itemName"][$i]."') LIMIT 10;";
          
          
          
          
          
          
          
          
          
          
          //可顯示查詢的程式碼
          // echo $str1."<br>";   
          // echo $str2."<br>";
          // echo $str3."<br>";
         //  echo $str4."<br>";
         // echo $str5."<br>";
         //  echo $str6."<br>";
          // echo $str7."<br>";
           
         
          
          //查詢及取得結果
           $result1 = mysqli_query($link, $str1);
           $result2 = mysqli_query($link, $str2);
           $result3 = mysqli_query($link, $str3);
           $result4 = mysqli_query($link, $str4);
           $result5 = mysqli_query($link, $str5);
           $result6 = mysqli_query($link, $str6);
           $result7 = mysqli_query($link, $str7);
       
          
          ?>
            <br> 
            <table bgcolor="#FFFFFF" cellpadding="5" border='1'
            style=" border:8px #FFD382 groove;
                    font-size:18px;
                    font-family:微軟正黑體;
                    text-align:center;"

            > 
              
              
              
              
              <?php         
            
            
            
            //建立表格
            // echo "<table border=1 >";
            
            //建立欄位名稱
   echo "<tr>";
           
              echo "<td>";
              echo "動物名稱";
              echo "</td>";
              
              echo "<td>";
              echo $meta="出沒地";
              echo "</td>";
              
              echo "<td>";
              echo "棲息地分布";
              echo "</td>";
              
              echo "<td>";
              echo "特徵";
              echo "</td>";
              
              echo "<td>";
              echo "習性";
              echo "</td>";
              
              echo "<td>";
              echo "主食";
              echo "</td>";
              
              echo "<td>";
              echo "圖片";
              echo "</td>";
              
            echo "</tr>";
            
            while (($row1 = mysqli_fetch_row($result1))&& 
                    ($row2 = mysqli_fetch_row($result2))&& 
                    ($row3 = mysqli_fetch_row($result3))&&
                    ($row4 = mysqli_fetch_row($result4))&&
                    ($row5 = mysqli_fetch_row($result5))&&
                    ($row6 = mysqli_fetch_row($result6))&&
                    ($row7 = mysqli_fetch_row($result7))                    
                    
                 
                    
                     ){
              echo "<tr>";
              
              for ($i=0;$i<count($row1);$i++){	
                     echo "<td>".$row1[$i] ."</td>";
                     
                     
                     
              for ($j=0;$j<count($row2);$j++){
                
                
                   echo "<td>".$row2[$j] ."</td>";
                 
                 
              for ($s=0;$s<count($row3);$s++){
                
                
                   echo "<td>".$row3[$j] ."</td>";


              for ($s=0;$s<count($row4);$s++){
                
                
                   echo "<td>".$row4[$j] ."</td>";
          
          
              for ($s=0;$s<count($row5);$s++){
                
                
                   echo "<td>".$row5[$j] ."</td>";
 
 
 
               for ($s=0;$s<count($row6);$s++){
                
                
                   echo "<td>".$row6[$j] ."</td>";
                   
                   
               for ($s=0;$s<count($row7);$s++){
                
                
                   echo "<td>"."<img src=$row7[$s]>"."</td>";   
              }}}}}}
              
              echo "</tr>";
            }
            }
            echo "$row";
            
        
        
        
        
        
        
        
        
        
            
            
            
            
            mysqli_free_result($result);
            mysqli_close($link);
            
            
  }
  ?>
</table >

</div>           
</body>
</html>






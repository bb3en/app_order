<!DOCTYPE html>
<?php>
$db_host = 'server1.prod.lionfree.net';
$db_name = 's1101137_app_order';
$db_user = 's1101137208';
$db_password = '821226';
$dsn = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
$countrow=1;

try {
    $db=new PDO($dsn, $db_user, $db_password);
    $stmt=$db->query("SELECT `*` FROM `member`");
    //$stmt=$db->query("  SELECT `Account_Password` FROM `SMILE_ACCOUNT` WHERE `Account_Account`='".$memberID."'");
    $msg=" ";
    
    foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        
        $msg.= $row;
           /* if($row['Account_Password']==$Password)
            {
                $_SESSION['Account_Password'] = $Password;
                echo "登入成功!";
                echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
                $countrow=0;
            }*/


    }           
               /* if($countrow==1)
                {
                echo "登入失敗!";
                echo '<meta http-equiv=REFRESH CONTENT=1;url=login.php>';
                }*/
    
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

?>
<html>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="initial-scale=1.0, width=device-width, user-scalable=no"  />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="stylesheet" href="plugin/jquery.mobile-1.4.5.min.css">
<link rel="stylesheet" href="plugin/jqm-docs.css">
<link rel="stylesheet" href="plugin/style.css">
<script src="plugin/jquery-1.11.3.min.js"></script>
<script src="plugin/jquery.mobile-1.4.5.min.js"></script>

<script>

Date.prototype.Format = function (fmt) { //author: meizz 
    var o = {
        "M+": this.getMonth() + 1, //月份 
        "d+": this.getDate(), //日 
        "h+": this.getHours(), //小时 
        "m+": this.getMinutes(), //分 
        "s+": this.getSeconds(), //秒 
        "q+": Math.floor((this.getMonth() + 3) / 3), //季度 
        "S": this.getMilliseconds() //毫秒 
    };
    if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    for (var k in o)
    if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
    return fmt;
}

$(document).ready(function () {
var d = new Date().Format("yyyy-MM-dd hh:mm");
localStorage.whataboutnow = "會員登錄";
document.getElementById("nowtime").innerHTML =  d;

});

function loadtime() {
    var d2 = new Date().Format("yyyy-MM-dd");
    document.getElementById("nowtime2").innerHTML =  d2;
    var d3 = new Date().Format("yyyy-MM-dd");
    document.getElementById("nowtime3").innerHTML =  d3;
}
</script>

</head>
<body>
<div data-role="page">
<!--我要訂餐-->  
 <div data-role="popup" id="order"  class="ui-corner-all" data-theme="a">
 <div data-role="header">
    <h2>我要訂餐</h2>
<?php echo $msg; ?>
 </div>
 <div data-role="main" class="ui-content">
 <script type="text/javascript">
   loadtime();
 </script>
  <form>
     <div style="padding:10px 20px;">
        <label>日期：<font id="nowtime2"></font></label>
        <label>選擇店家</label>
        <select name="provide1" >
          <option value="provide_0">廣八自助餐</option>
        </select>
        <label>選擇餐點</label>
        <select name="menusession_1" value="menu1_0">
          <option value="menu1_0">無</option>
          <option value="menu1_1">雞腿便當</option>
          <option value="menu1_2">豬排便當</option>
          <option value="menu1_3">排骨便當</option>
          <option value="menu1_4">雞排便當</option>
        </select>
        <label>選擇店家</label>
        <select name="provide2">
          <option value="provide_0">廣八自助餐</option>
        </select>
        <label>選擇餐點</label>
        <select name="menusession_1" value="menu1_0">
          <option value="menu1_0">無</option>
          <option value="menu1_1">雞腿便當</option>
          <option value="menu1_2">豬排便當</option>
          <option value="menu1_3">排骨便當</option>
          <option value="menu1_4">雞排便當</option>
        </select>
        <label>選擇取餐地點</label>
        <select name="region" >
          <option value="region_0">管理學院</option>
          <option value="region_1">人文學院</option>
          <option value="region_2">行政大樓</option>
        </select>
        <button type="submit" class="ui-corner-all">送出</button>
     </div>
  </form>
  </div> 
  <div data-role="footer" data-position="fixed">   
</div>    
</div> 

<!--訂單查詢-->  
 <div data-role="popup" id="record" >
   <div data-role="header">
     <h2>訂單查詢</h2>
   </div>
  <div data-role="main" class="ui-content">
    <div >日期：<font id="nowtime3"></font></div>
 <script type="text/javascript">
   loadtime();
 </script> 
    <table>
      <tr>
        <td>店家A</td>
        <td></td>
      </tr>
      <tr>
        <td>店家名稱：</td>
        <td>廣一便當店</td>
      </tr>
      <tr>
        <td>餐點名稱：</td>
        <td>蜜汁雞腿飯</td>
      </tr>
      <tr>
        <td>餐點價格：</td>
        <td>60元</td>
      </tr>
      <tr>
        <td>餐點數量：</td>
        <td>1份</td>
      </tr>
      <tr>
        <td>店家B</td>
        <td></td>
      </tr>
      <tr>
        <td>店家名稱：</td>
        <td>廣四拉麵店</td>
      </tr>
      <tr>
        <td>餐點名稱：</td>
        <td>豚骨拉麵</td>
      </tr>
      <tr>
        <td>餐點價格：</td>
        <td>65元</td>
      </tr>
      <tr>
        <td>餐點數量：</td>
        <td>1份</td>
      </tr>
      <tr>
        <td>訂單總額：</td>
        <td>125元</td>
      </tr>
      <tr>
        <td>訂單狀態：</td>
        <td>處理中</td>
      </tr>
    </table>
  </div>
  <div data-role="footer">
    
  </div>
</div>
<!--歷史訂單-->  
 <div data-role="popup" id="history" >
   <div data-role="header">
     <h2>歷史訂單</h2>
   </div>
  <div data-role="main" class="ui-content">
    <form>
      年：<select name="year" >
              <option value="year_2015">2015</option>
         </select>
      月：<select name="month" >
              <option value="month_1">1</option>
              <option value="month_2">2</option>
              <option value="month_3">3</option>
              <option value="month_4">4</option>
              <option value="month_5">5</option>
              <option value="month_6">6</option>
         </select>
      <button type="submit" class="ui-corner-all">搜尋</button> 
    </form>
    <div>
      <p>日期：2015/11/17</p>
      <p>店家名稱：廣一便當店</p>
      <p>餐點名稱：蜜汁雞腿飯</p>
      <p>餐點價格：60元</p>
      <p>餐點數量：1份</p>
    </div>
  </div>
  <div data-role="footer">
    
  </div>
</div>      
<div data-role="header" class="tophaed">
  <h1>KUAS燕巢訂餐系統-首頁</h1>
</div>
  <div data-role="main" class="ui-content">
    <div class="newtable"> 
      <a >最新消息</a>
      <p></p>
        <div>目前時間  ：<font id="nowtime"></font></div>
		    已付款人數：<div id="ispay"></div>
		    現金餘額  ：<div id="cash"></div>
<div>
  <a href="#order"  data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ">我要訂餐 </a>
</div>
<div>
  <a href="#record" data-rel="popup" data-position-to="window" data-transition="fade" class="ui-btn ui-corner-all ui-shadow ">訂單查詢</a>
</div>
<div>
<a href="#history" data-rel="popup" data-position-to="window" data-transition="fade" class="ui-btn ui-corner-all ui-shadow ">歷史紀錄</a>
</div>
	</div >     
</div>
 <div data-role="footer" data-position="fixed">
   
 </div>
</div> 





</body>
</html>

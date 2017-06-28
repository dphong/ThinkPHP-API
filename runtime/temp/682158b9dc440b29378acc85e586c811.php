<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\web\api\public/../application/index\view\index\send.html";i:1498621971;s:59:"D:\web\api\public/../application/api/view/index\header.html";i:1495591400;s:59:"D:\web\api\public/../application/api/view/index\footer.html";i:1495591400;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>我要寄件</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/common.css">
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/buttons.css">
<style>
body , html,
/*#all{width:1001px}   overflow:hidden;*/
#allmap {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
#container{height:100%;width:1001px}
#name{height:28px;width:1000px}
#result{margin:auto 0;height:33px;}
#bp10{height:5px}
body{
    color: #333;
    font: 16px Verdana, "Helvetica Neue", helvetica, Arial, 'Microsoft YaHei', sans-serif;
    margin: 0px;
    padding: 0px;
}
#centre{height:100%;width:1001px}
a{
    color: #868686;
    cursor: pointer;
}
a:hover{
    text-decoration: underline;
}
h2{
    color: #4288ce;
    font-weight: 400;
    padding: 6px 0;
    margin: 6px 0 0;
    font-size: 28px;
    border-bottom: 0px solid #eee;
    margin-bottom: 35px;
}
.text{
    margin-bottom: 10px;
}

div{
margin:8px;
}
.info{
    padding: 12px 0;
    border-bottom: 1px solid #eee;
}

.copyright{
    margin-top: 35px;
    padding: 12px 0;
 /* border-top: 0px solid #eee;*/
    clear: both;
    background: #eee;
 /*   margin-top: 10px; */
}

body, div, h1, h2, h3, h4, h5, h6, p, ul, ol, form, dl, dt, dd {
    margin: 0;
}
.head {
    background: #f5f5f5;
    position: relative;
    z-index: 1;
}
.headin {
    width: 1000px;
    margin: 0 auto;
    position: relative;
    overflow: hidden;
    height: 75px;
}
.logo {
    height: 100%;
    width: 154px;
    position: absolute;
    left: 0px;
    background: url(__PUBLIC__/photo/logo.jpg) no-repeat left center;
}
.logoTxt {
    position: absolute;
    top: -100px;
}
.nav {
    position: absolute;
    bottom: 0;
    left: 380px;
}
.nav li {
    float: left;
    width: 92px;
    height: 75px;
}
.nav li a {
    float: left;
    padding-left: 22px;
    padding-right: 22px;
    font-size: 14px;
    line-height: 75px;
}
.headr {
    float: right;
    margin-right: 5px;
}
.username {
    display: inline-block;
    width: 40px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    vertical-align: top;
}
.topTxt {
    font-size: 12px;
    line-height: 75px;
}
.username, .exitLink {
    color: #666;
}
.separ1 {
    color: #bbb;
    position: relative;
    top: -1px;
    margin-left: 8px;
    margin-right: 8px;
}
.username, .exitLink {
    color: #666;
}
Inherited from body
body {
    font-family: 'Microsoft Yahei';
    font-size: 14px;
    color: #333;
    line-height: 1.5;
}
.auto1 {
    margin-left: auto;
    margin-right: auto;
    width: 1000px;
}
.fix {
}
.pb30 {
    padding-bottom: 30px;
}
.pt20 {
    padding-top: 20px;
}
Pseudo ::after element
.fix:after {
    display: table;
    content: '';
    clear: both;
}
.lbar {
    float: left;
    width: 180px;
    padding-bottom: 8px;
}
.lNav1 {
    border-right: 1px solid #ddd;
    width: 130px;
}
.lNav1li {
    margin-bottom: 10px;
    position: relative;
    left: 1px;
}
.lNav1-liOn a {
    color: #dc4a3b;
    border-right-color: #dc4a3b;
}
.lNav1a {
    display: block;
    color: #999;
    cursor: pointer;
    line-height: 30px;
    border-right: 1px solid #ddd;
    font-size: 15px;
}
ul, ol {
    padding-left: 0;
    list-style-type: none;
}
.rmain1 {
    width: 800px;
    float: right;
    min-height: 600px;
}
.rmain1 .intro {
    width: 100%;
    padding-top: 0;
    margin-bottom: 20px;
}
.intro {
    color: #aaa;
    text-align: left;
    width: 1000px;
    margin: 0 auto;
    padding-bottom: 10px;
    padding-top: 20px;
    font-size: 13px;
    border-bottom: 1px dotted #bbb;
}
.intro a {
    color: #aaa;
    text-decoration: none;
    width: 100%;
    text-align: left;
    margin-right: 2px;
    margin-left: 2px;
}
.table1 {
    margin-bottom: 50px;
}
.table1 th {
    width: 100px;
    text-align: right;
    padding: 0;
    vertical-align: top;
    height: 32px;
    line-height: 32px;
    padding: 6px 0;
    font-weight: normal;
}
.table1 td {
    padding: 6px 0 6px 20px;
    height: 32px;
    line-height: 32px;
    vertical-align: top;
}
.reds {
    color: #f00;
}
.btn1 {
    height: 32px;
    line-height: 32px;
    text-align: center;
    background: #fe9388;
    color: #fff;
    font-size: 14px;
    display: inline-block;
    padding: 0 20px;
}

.mt10 {
    margin-top: 10px;
}
.footer {
    clear: both;
    background: #eee;
    margin-top: 10px;
}
.fmenu {
    width: 700px;
    float: left;
}
.footer dl:first-child {
    margin-left: 0px;
}
.footer dl {
    float: left;
    margin-left: 100px;
}
.footer dt {
    padding-bottom: 10px;
    font-size: 16px;
}
.footer a {
    color: #777;
    font-size: 12px;
    line-height: 1.8;
}
.address {
    float: right;
    padding-top: 25px;
    color: #aaa;
    font-size: 13px;
    text-align: right;
}
.teltxt {
    font-size: 26px;
    color: #333;
    margin-bottom: 2px;
}
.mini-footer {
    box-sizing: border-box;
    margin-top: 20px;
    padding: 10px;
    height: 40px;
    background-color: #bbb;
    align-items: center;
}
a.footer-icp {
    text-transform: none;
    text-decoration: none;
    color: #363636;
}
a.footer-icp:hover {
    color: #777777;
}
</style>
<script type="text/javascript" src="__PUBLIC__/jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
</head>
<body>
    
<div class="head">
    <div class="headin">
        <a href="/" class="logo"><h1 class="logoTxt">IOT</h1></a>
        <ul class="nav">
            <li class="navi"><a href="/" id="service">开发者</a></li>
            <li class="navi"><a href="/sample" id="cases">API</a></li>
            <li class="navi"><a href="/map" id="device">设备</a></li>
        </ul>
            <script type="text/javascript">
            function logout(){
                window.location.href = "/logout";
            }
            function create(){
                window.location.href = "/create";
            }
            function home(){
                window.location.href = "/";
            }
            function login(){
                window.location.href = "/login";
            }
        </script>
        <div class="headr">
            <span class="topTxt">
                <a href="javascript:void(0)" onclick="<?php echo empty($user->username)?"login":"home";?>()" class="username"  title='<?php echo empty($user->username)?"登录":$user->username;?>' ><?php echo empty($user->username)?"登录":$user->username;?></a>
                <span class="separ1">|</span>
                <a href="javascript:void(0)" onclick="<?php echo empty($user->username)?"create":"logout";?>()" class="exitLink"><?php echo empty($user->username)?"注册":"退出";?></a>
            </span>
        </div>
    </div>
    <!--div style="display: none;">
          <iframe src="/views/pushlet/sessionout.jsp">
               不支持iframe
          </iframe>
          <iframe src="/views/pushlet/kickoff.jsp">
            不支持iframe
          </iframe>
    </div-->
</div>
<center>
<div id="[div]">

<style type="text/css" src="../untitled.png">
#all{
	width:100%;
	height:1000px;
	margin:0px;
	padding:0px;
background-image:url(__PUBLIC__/photo/img/u=13891043225,973488654&fm=26&gp=0.jpg);
  
}
	
#head{
	padding-top:60px;
	width:100%;
	height:130px;
	text-align:center;
	
}	

#center{
	width:100%;
	height:750px;
	margin:0px;
	padding:0px;

}	
#footer{
	  width:100%;
	  height:100px;
	  clear:both;
	  padding-top:40px;
	 
}

.left{
	width:30%;
	height:700px;
	float:left;
    padding-top:20px;
}

.right{
      width:35%;
	 height:700px;
	 float:left;
	  padding-top:20px;
}

.middle{
      width:35%;
	   height:700px;
	   float:left;
	   padding-top:20px;
	 
}
h2{
   text-align:center;
	font-size:30px;
	font-family:kartika;
	color:#666;	

}

h1{
font-size:50px;
font-family:Verdana, Geneva, sans-serif;
color:#333;

}

.duiqi{
	font-size:25px;
	 color:black;
   font-family:Verdana, Geneva, sans-serif;
 }
	

.footer-icp{
	font-size:9px;
   font-family:Verdana, Geneva, sans-serif;
  text-decoration:none;
	 color:#333;
}

.botton{
	 background-color:#FCC;
   border-radius: 4px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
 
  height:25px;
  border-bottom-width: 10px;
  width:200px;
}

.botton1{
	
	background-color:#FCF; 
	width:60px; 
	height:25px;

}
.botton2{
	background-color:#FCF; 
	width:70px; 
	height:25px;
}

span{
	font-size:25px;
	font-family:Verdana, Geneva, sans-serif;
	
}

.down{
margin-top:50px;	
}
.up{
	
padding-top:30px;	
	
	}
</style>		

<div id="all">
<!--
头部
-->	
	<div id="head">
	<center>
	<h1>我要寄件&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h1>
	</center>
	</div>
	<!--
中间
-->	
<div id="center">
	<!--
中间左边
-->	
	<div class="left">
  <center>
 
         <div  class="up">
            <marquee behavior="alternate">
               <!--img src="img/-745f92ad7cde027a.jpg" width="" height=""--> 
            </marquee>
        </div>
    
       <div class="down">
       
            <img src="img/12.png"	width="" height="">
                      <br />
          
             <input type="submit"  class="botton2" value="开始教程">
       
       </div>
     
  </center> 
     </div>		
	 
	
     
     
     

 <div class="middle">
 <center>

<form action="http://iot.wlwshow.cn/check" method="get">

<table>	
<div name="one">
 <tr>
 <td colspan="100">
 <h2>寄件人</h2>
 </td>
 </tr>
    <tr>
	<td> <label for="sender-name" class="duiqi">姓名:</label></td>
	<td><input type="text" name="sender_name"  id="sende-name"  class="botton" placeholder="我叫小可爱，你呢？" required/></td>
    </tr>

  
<tr>
	<td>
   
	<label for="sender-mobile" class="duiqi">手机:</label></td>
   
	<td>
    <input type="text"  title="请输入11位有效的手机号" pattern="1[0-9]{10}" required 
    name="send_phone" id="sender-mobile" class="botton" placeholder="小主给我留个号码吧" /></td>
</tr>	
	
  
<tr>
	<td>
	<label for="validation" class="duiqi">验证码:</label></td>
	<td><input type="text" name="yanzhengma" id="validation" class="botton" placeholder="验证身份的时候到啦" required/>
	<input type="submit"  class="botton1" value="获取"></td>
</tr>

 <tr>
	<td>
  	<label for="sender-address" class="duiqi">上门地址:</label></td>
 <td> 
 
 
 <!--  省市联动插件 -->


  <input text="text" name="dizhi" id="sender-address"  data-parsley-trigger="change"
     data-parsley-errors-container=".sender-location" class="botton" placeholder="小可爱踏着七彩祥云来找你啦" required/>

     
   
     
     </td>
 </tr>	
 
	<tr>
     <td>
	   <label for="sender-address-detail"  class="duiqi">详细地址:</label></td>
	  <td> <input text="text" name="adress" id="sender-address-detail" class="botton" placeholder="详细一点，我要快点找到你" required /></td>
 </tr>
</div>  


<tr>
<td colspan="100">
<h2>收件人</h2>
</td>
</tr>
   <tr>
		<td> <label for="receiver-name" class="duiqi">姓名:</label></td>
	<td>  <input type="text" name="xingming" id="receiver-name" class="botton" placeholder="快递要送给谁呢？" required/></td>
	</tr>
	
     <tr>
		<td>
	   <label for="receiver-mobile" class="duiqi">手机:</label></td>
	  <td> <input type="text"  title="请输入11位有效的手机号" pattern="1[0-9]{10}" required
       name="haoma" id="receiver-mobile" class="botton" placeholder="TA的号码是多少，我帮小主联系啦" /></td>
</tr>
	

    <tr>
		<td>
  	   <label for="receiver-address" class="duiqi">上门地址:</label></td>
     <td><input text="text" name="dizhi" id="receiver-address"   data-parsley-trigger="change"
       data-parsley-errors-container=".receiver-location" class="botton" placeholder="我去哪里才能见到TA" 
       required/></td>
       </tr>
	
	   
       <tr>
		<td> <label for="receiver-address-detail" class="duiqi">详细地址:</label></td>
      <td> <input text="text" name="adress" id="receiver-address-detail" class="botton" placeholder="我这么可爱，小主就写的走心点吧" required/></td>
 </tr>

</table> 
  
 </form> 
 </center>


</div>
   
   
      
<div class="right">

<table>
<form action="http://iot.wlwshow.cn/check" method="post">

<center>
<tr>

<h2>宝贝信息</h2>

</tr>
<tr>
<span>类型：</span>
<input type="radio" name="splx" />服饰  <input type="radio" name="splx" />食品 
<input type="radio" name="splx" />数码   <br /><br /><input type="radio" name="splx" />生活用品
<input type="radio" name="splx" />文件   <input type="radio" name="splx" />其他
<br /><br />
 <label for="wight" class="duiqi">重量:</label>
 
  <select  class="botton" id="wight" name="zhongliang">
  
 <option value="wight" select="selected">0 ~ 5KG</option>
 <option value="wight">6 ~ 10KG</option>
 <option value="wight">11 ~ 20KG</option>
 <option value="wight">20KG以上</option>
 </select>
<br /><br /><br />

<span>备注:</span>
<textarea rows="3" cols="20" placeholder="快递小哥我有话要说"></textarea>
</tr>


<tr>
<h2>取件</h2>
</tr>
<tr>
<label for="time" class="duiqi">时间:</label>
<!--<input type="text" class="botton" name="sj" id="time" />-->
<input type="datetime-local" class="botton" name="sj" id="time"  value="2017-06-26T13:59:59"/>
<p>亲，我们的取货时间一般为下午三点到五点</p>
<br />
<span>备注：</span>
<textarea rows="3" cols="20" placeholder="你长得好看说什么都对"></textarea> <br /><br />
	     
	 <input type="reset"  class="botton1" value="重置">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="submit" class="botton1" value="提交">
</tr> 
 </table>    
</form>          
	</center>    
	
</div>		
</div>
		
</div>	

</div>
</center>
<footer class="mini-footer" id="bottom">
    <center>Copyright &copy; <?php echo date("Y");?> <a class="footer-icp" href="/">物联网智能管理平台</a> &nbsp;&nbsp;<a class="footer-icp" href="http://www.miitbeian.gov.cn/">皖ICP备17005522号-1</a></center>
<script>
    var adjustFooter = function() {
        if( ($('#bottom').offset().top + $('#bottom').outerHeight(true) )<$(window).height() ) {
            var footerBottom = $(window).height() - $('#bottom').outerHeight(true) - $('#bottom').offset().top;
            footerBottom = Math.floor(footerBottom) + 20;
            $('#bottom').css({'bottom': '-' + footerBottom + 'px', 'position': 'relative'});
        }
    };
    var $ = jQuery;
    $(document).ready(function() {
        adjustFooter();
    });
</script>
</footer>
</body>
</html>

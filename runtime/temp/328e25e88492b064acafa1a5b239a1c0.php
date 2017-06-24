<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"D:\web\api\public/../application/api\view\index\index.html";i:1498292605;s:59:"D:\web\api\public/../application/api\view\index\header.html";i:1495591400;s:59:"D:\web\api\public/../application/api\view\index\footer.html";i:1495591400;}*/ ?>
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

<style type="text/css">
#all{
	width:100%;
	height:1000px;
	margin:0px;
	padding:0px;
  background:url(img/u=3816335401,4238052269&fm=26&gp=0.jpg);

}
	
#head{
	padding-top:80px;
	width:100%;
	height:180px;
	text-align:center;
}	
	
#center{
	width:100%;
	height:700px;
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
   
}

.right{
      width:35%;
	 height:700px;
	 float:left;
}

.middle{
      width:35%;
	   height:700px;
	  float:left;
}

h2{
	font-size:30px;
	font-family:Verdana, Geneva, sans-serif;
	color:#666666;	
}

h1{
font-size:100px;
font-family:"Lucida Console", Monaco, monospace;
color:#30C;
}

.duiqi{
	font-size:10px;
	color:#C66;
   font-family:Verdana, Geneva, sans-serif;
	}
	

.footer-icp{
	font-size:9px;
   font-family:Verdana, Geneva, sans-serif;
  text-decoration:none;
	 color:#333;
}
</style>		
</head>

<body>
<div id="all">
<!--
头部
-->	
	<div id="head">
	<center>
	<h1>快递名（logo)</h1>
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
     <img src="#" width="" height="">
     <img src="#"	width="" height=""><br />
     <input type="submit" value="开始教程"> 
     </div>		
	 
	 

 <div class="middle">
 
<form>
<center>    
<table>	
 <tr><h2>寄件人</h2></tr>
    <tr>
	 <label for="sender-name" class="duiqi">姓名:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="xingming" id="sender-name" placeholder="" /><br /><br />
	
	
	<label for="sender-mobile" class="duiqi">手机:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="text" name="haoma" id="sender-mobile" placeholder="" /><br /><br />
	
	
		
	<label for="validation" class="duiqi">验证码:</label>&nbsp;&nbsp;&nbsp;
	<input type="text" name="yanzhengma" id="validation" placeholder="" /><br /><br />
    	          
 
  	<label for="sender-address" class="duiqi">上门地址</label>
   <input text="text" name="dizhi" id="sender-address"  data-parsley-trigger="change"
     data-parsley-errors-container=".sender-location" placeholder="" /><br /><br />


	 
	   <label for="sender-address-detail"  class="duiqi">详细地址</label>
	   <input text="text" name="adress" id="sender-address-detail" placeholder="" /><br /><br />
 </tr>
	 
<tr><h2>收件人</h2></tr>
    <tr>
		 <label for="receiver-name">姓名</label>
	    <input type="text" name="xingming" id="receiver-name" placeholder="" /><br /><br />
	
	
	   <label for="receiver-mobile" class="required col-xs-2 control-label">手机</label>
	   <input type="text" name="haoma" id="receiver-mobile" placeholder="" /><br /><br />

	
  	   <label for="receiver-address" class="required col-xs-2 control-label">上门地址</label>
      <input text="text" name="dizhi" id="receiver-address"   data-parsley-trigger="change"
       data-parsley-errors-container=".receiver-location" placeholder="" /><br /><br />
	 
	    <label for="receiver-address-detail" class="required col-xs-2 control-label">详细地址</label>
       <input text="text" name="adress" id="receiver-address-detail" placeholder="" /><br /><br />
 </tr>
</table> 
 </center>       
   </form>    
 </div>
 
      
<div class="right">
<form>
<center>
<table>
<tr><h2>宝贝信息</h2></tr>
<tr>
类型：
<input type="radio" name="fs" />服饰  <input type="radio" name="sp" />食品 
<input type="radio" name="sm" />数码   <input type="radio" name="shyp" />生活用品
<input type="radio" name="leixing" />文件   <input type="radio" name="leixing" />其他
<br /><br />
重量：<input type="text" name="zhongliang" /><br /><br />
备注:
<textarea rows="3" cols="10"></textarea>
</tr>
<br /><br /><br /><br /><br />
<tr><h2 style="color:blue">取件</h2></tr>
<tr>
取件时间：<input type="text" name="qujian" /><br /><br />
备注：
<textarea rows="3" cols="10"></textarea> <br /><br />
	     
	 <input type="reset" value="重置">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="submit" value="提交">
</tr> 
 </table> 
   </center>        
</form>          
	
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

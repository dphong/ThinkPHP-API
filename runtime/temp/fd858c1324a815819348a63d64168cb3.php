<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"D:\web\api\public/../application/index\view\user\data.html";i:1495591400;s:61:"D:\web\api\public/../application/index\view\index\header.html";i:1498876551;s:61:"D:\web\api\public/../application/index\view\index\footer.html";i:1495591400;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>个人中心</title>
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/common.css">
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/buttons.css">
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/style.css">
<script type="text/javascript" src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
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
                window.location.href = "logout";
            }
            function reg(){
                window.location.href = "reg";
            }
            function home(){
                window.location.href = "/";
            }
            function login(){
                window.location.href = "login";
            }
        </script>
        <div class="headr">
            <span class="topTxt">
                <a href="javascript:void(0)" onclick="<?php echo empty($list->username)?"login":"home";?>()" class="username"  title='<?php echo empty($list->username)?"登录":$list->username;?>' ><?php echo empty($list->username)?"登录":$list->username;?></a>
                <span class="separ1">|</span>
                <a href="javascript:void(0)" onclick="<?php echo empty($list->username)?"reg":"logout";?>()" class="exitLink"><?php echo empty($list->username)?"注册":"退出";?></a>
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
<div id="centre">

<div class="auto1 pb30 pt20">

        <div class="lbar">
            
<ul class="lNav1">
    <li id="userview_li" class="lNav1li lNav1-liOn"><a href="/" class="lNav1a userview-link">基本资料</a></li>
    <li id="editpwd_li" class="lNav1li"><a href="/index/user/data" class="lNav1a editpwd-link">查看数据</a></li>
    <li id="editpwd_li" class="lNav1li"><a class="lNav1a editpwd-link">修改密码</a></li>
    <li id="gateway_li" class="lNav1li"><a class="lNav1a gateway-link">网关</a></li>
    <li id="device_li" class="lNav1li"><a class="lNav1a device-link">设备</a></li>
    <li id="action_li" class="lNav1li"><a class="lNav1a action-link">动作</a></li>
</ul>
        </div>
        <div class="rmain1">
            <div class="intro"><a href="/">用户中心</a>&gt;&nbsp;查看数据</div>
            <div id="uiblc">
                <table class="table1">
                    <tr><td>
                    <a href="/api/map/show">查看MAP数据</a>
                    </td></tr>
                    <tr><td>
                    <a href="/api/rfid/show">查看RFID数据</a>
                    </td></tr>
                </table>
                <div style="display: none"><input type="text" id="userType"></input></div>
            </div>


        </div>

    </div>

</div>
</center>
<footer class="mini-footer" id="bottom">
    <center>Copyright &copy; <?php echo date("Y");?> <a class="footer-icp" href="/">物联网智能管理平台</a> &nbsp;&nbsp;
        <a class="footer-icp" href="http://www.miitbeian.gov.cn/">皖ICP备17005522号-1</a></center>
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
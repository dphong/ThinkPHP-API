<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\web\api\public/../application/index\view\user\login.html";i:1498901057;s:61:"D:\web\api\public/../application/index\view\index\header.html";i:1498876551;s:61:"D:\web\api\public/../application/index\view\index\footer.html";i:1495591400;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>用户登录</title>
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
<script type="text/javascript" src="/static/js/Validform_v5.3.2.js"></script>
<script type="text/javascript" src="/static/js/passwordStrength.js"></script>
<style>
    .login .div {
        text-align: left;
    }
</style>
<h2>用户登录</h2>
<FORM method="post" class="login" action="<?php echo url('/'); ?>">
    <table width="100%" style="table-layout:fixed;">
        <tbody>
            <tr>
                <td class="need" style="width:10px;"></td>
                <td style="width:70px;">用户名：</td>
                <td style="width:240px;">
                    <input type="text" class="inputtxt" name="username" datatype="s3-26" sucmsg=" " nullmsg="请输入用户名" errormsg="请输入正确的用户名" />
                </td>
                <td>
                    <div class="Validform_checktip"></div>
                    <div class="info">用户名/手机号/邮箱
                        <span class="dec">
                            <s class="dec1">◆</s>
                            <s class="dec2">◆</s>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="need" style="width:10px;"></td>
                <td style="width:70px;">密码：</td>
                <td style="width:240px;">
                    <input type="password" class="inputtxt" name="password" plugin="passwordStrength" datatype="*6-18" sucmsg=" " nullmsg="请输入密码" errormsg="请输入正确的密码" />
                </td>
                <td>
                    <div class="Validform_checktip"></div>
                    <div class="info">请输入密码
                        <span class="dec">
                            <s class="dec1">◆</s>
                            <s class="dec2">◆</s>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="need" style="width:10px;"></td>
                <td style="width:70px;">验证码：</td>
                <td style="width:240px;">
                    <input type="text" class="inputtxt" ajaxurl="/index/user/code" validform_valid="false" name="code" datatype="n4-4|s4-4" sucmsg=" " nullmsg="请输入验证码" errormsg="验证码错误" />
                </td>
                <td>
                    <div class="Validform_checktip"></div>
                    <div class="info">请输入验证码，不区分大小写
                        <span class="dec">
                            <s class="dec1">◆</s>
                            <s class="dec2">◆</s>
                        </span>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="need" style="width:10px;"></td>
                <td style="width:70px;"></td>
                <td style="width:200px;">
                    <div id="captcha_image" style="width:200px;"><div><img src="<?php echo captcha_src(); ?>" alt="captcha" style="margin-left: 5px;"/></div>
                </td>
                <td>

                </td>
            </tr>
        </tbody>
    </table>
<INPUT type="button" style="position: relative; right: 150px; " class="button button-rounded button-small button-primary" value="注册" onclick="window.location=('reg')" /> &nbsp;
<INPUT type="submit" style="position: relative; right: 150px; " class="button button-rounded button-small button-primary" value="登录">
</FORM>
<script>
    $('#captcha_image').click(function(){
        $(this).find('img').attr('src','/captcha.html?r='+Math.random());
        $("#inputtxt")[2].validform_valid="false";
    });
</script>
<script>

$(function(){
	var getInfoObj=function(){
			return 	$(this).parents("td").next().find(".info");
		}
	$("[datatype]").focusin(function(){
		if(this.timeout){clearTimeout(this.timeout);}
		var infoObj=getInfoObj.call(this);
		if(infoObj.siblings(".Validform_right").length!=0){
			return;	
		}
		infoObj.show().siblings().hide();
		
	}).focusout(function(){
		var infoObj=getInfoObj.call(this);
		this.timeout=setTimeout(function(){
			infoObj.hide().siblings(".Validform_wrong,.Validform_loading,.Validform_right").show();
		},0);
		
	});
	
	$(".login").Validform({
		tiptype:2,
		usePlugin:{
			passwordstrength:{
				minLen:6,
				maxLen:18,
				trigger:function(obj,error){
					if(error){
						obj.parent().next().find(".passwordStrength").hide().siblings(".info").show();
					}else{
						obj.removeClass("Validform_error").parent().next().find(".passwordStrength").show().siblings().hide();	
					}
				}
			}
		}
	});
})
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','/static/js/analytics.js','ga');

  ga('create', 'UA-81001026-1', 'auto');
  ga('send', 'pageview');
 </script>
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

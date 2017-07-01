<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:56:"D:\web\api\public/../application/api\view\map\index.html";i:1498876682;s:60:"D:\web\api\public/../application/api\view\index\header3.html";i:1498876601;s:59:"D:\web\api\public/../application/api\view\index\footer.html";i:1495591400;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>坐标选取系统</title>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/common.css">
<link charset="utf-8" rel="stylesheet" href="__PUBLIC__/css/buttons.css">
<style>
body , html,
/*#all{width:1001px}   overflow:hidden;*/
#allmap {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
#container{height:540px;width:1001px}
#name{height:28px;width:1000px}
#result{margin:auto 0;height:33px;}
#bp10{height:5px}
body{
    color: #333;
    font: 16px Verdana, "Helvetica Neue", helvetica, Arial, 'Microsoft YaHei', sans-serif;
    margin: 0px;
    padding: 0px;
}
#centre{height:600px;width:1001px}
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
                <a href="javascript:void(0)" onclick="<?php echo empty($user->username)?"login":"home";?>()" class="username"  title='<?php echo empty($user->username)?"登录":$user->username;?>' ><?php echo empty($user->username)?"登录":$user->username;?></a>
                <span class="separ1">|</span>
                <a href="javascript:void(0)" onclick="<?php echo empty($user->username)?"reg":"logout";?>()" class="exitLink"><?php echo empty($user->username)?"注册":"退出";?></a>
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
<div id="bp10"></div>
<div id="name">请输入查找的位置:<input type="text" id="suggestId" size="30" style="width:300px;" placeholder="示例输入：合肥市蜀山区合肥师范学院锦绣校区" /></div>
<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>
<div id="container"></div>
<div id="bp10"></div>
<div id="result">
    经度：<input type="text" id="lng" style="width:100px;" /> 纬度：<input type="text" id="lat" style="width:100px;" />
</div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=wCedEoVpANRk7a9xi0o3oXd77RGyMLtg" ></script>
<script type="text/javascript">
            function logout(){
                window.location.href = "/logout";
            }
            function reg(){
                window.location.href = "/reg";
            }
            function home(){
                window.location.href = "/";
            }
            function login(){
                window.location.href = "/login";
            }
        </script>
<script type="text/javascript">
    map = new BMap.Map("container");
    <?php echo $point; ?>
    function G(id) {
        return document.getElementById(id);
    }

    //var map = new BMap.Map("container");
    //map.centerAndZoom("合肥",13);                   // 初始化地图,设置城市和地图级别。
    map.centerAndZoom(point,14);
    ac = new BMap.Autocomplete(    //建立一个自动完成的对象
    {
        "input" : "suggestId"
        ,"location" : map
    });

    <?php echo $setMarker; ?>
    setEditView(point.lng,point.lat);
    ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
        var str = "";
        var _value = e.fromitem.value;
        var value = "";
        if (e.fromitem.index > -1) {
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }    
        str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;

        value = "";
        if (e.toitem.index > -1) {
            _value = e.toitem.value;
            value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        }    
        str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
        G("searchResultPanel").innerHTML = str;
    });

    var myValue;
    ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
    var _value = e.item.value;
        myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
        G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;

        setPlace();
    //		map.removeOverlay(marker);    
    //		alert("fda");
    //		marker.dispose();
    });

    map.enableScrollWheelZoom();
    //marker.enableDragging();    
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.ScaleControl());


    map.addEventListener("click",function(e){
        map.removeOverlay(marker);
        //	marker.dispose();
        setEditView(e.point.lng,e.point.lat);
        point = new BMap.Point(e.point.lng,e.point.lat);
        marker = new BMap.Marker(point);  // 创建标注
        map.addOverlay(marker);              // 将标注添加到地图中
    //	alert(e.point.lng + "," + e.point.lat);
    });
    //	marker.addEventListener("click", function(){    
    // 		map.removeOverlay(marker);
    //		marker.dispose();
    //		alert("fdas");
    //		maker = new BMap.Point(e.point.lng,e.point.lat);
    //		map.addOverlay(marker);
    //	});
    marker.addEventListener("dragend", function(e){    
        setEditView(e.point.lng,e.point.lat);
    });

    function setEditView(x,y) {
        var value1 = document.getElementById("lng");
        var value2 = document.getElementById("lat");
        value1.value = x;
        value2.value = y;	
    }
    function setMarker(){
    //    alert(arguments[0]);
    //    alert(arguments[1]);
        if(arguments[0]===null)
        {
            var x=117.234877;
            var y=31.756886;
        }
        else
        {
            var x=arguments[0];
            var y=arguments[1];
        }
        marker = new BMap.Marker(arguments[0]);
        point = new BMap.Point(x,y);
        marker = new BMap.Marker(point);  // 创建标注
        map.addOverlay(marker);              // 将标注添加到地图中
        marker.enableDragging();
    }

    function setPlace(){
        map.clearOverlays();    //清除地图上所有覆盖物
        function myFun(){
            var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
            map.centerAndZoom(pp, 14);
         /*   for (i in pp){
                alert(i);
                alert(pp[i].toSource());
            }
            alert(JSON.stringfy(pp));*/
    //        map.addOverlay(new BMap.Marker(pp));    //添加标注
            setMarker(pp.lng,pp.lat);
            setEditView(pp.lng,pp.lat);
        }
        var local = new BMap.LocalSearch(map, { //智能搜索
          onSearchComplete: myFun
        });
        local.search(myValue);
    }

</script>

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
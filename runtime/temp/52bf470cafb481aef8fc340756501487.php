<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"D:\web\api\public/../application/api\view\index\sample.html";i:1489152760;s:59:"D:\web\api\public/../application/api\view\index\header.html";i:1490772130;s:59:"D:\web\api\public/../application/api\view\index\footer.html";i:1488630856;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>API管理</title>
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
</head>
<body>
    
<div class="head">
    <div class="headin">
        <a href="/" class="logo"><h1 class="logoTxt">IOT</h1></a>
        <ul class="nav">
            <li class="navi"><a href="/" id="service">开发者</a></li>
            <li class="navi"><a href="sample" id="cases">API</a></li>
            <li class="navi"><a href="map" id="device">设备</a></li>
        </ul>
<?php 
use think\Request;
use app\index\model\Users;
$request = Request::instance();
if($request->cookie('uid')){
    $list = Users::get(['user_id'=> $request->cookie('uid')]);
    $validate = createPasswd($list->user_id . $list->username . $list->zcsj);
    if($request->cookie('validate') == $validate){
        $validate = createPasswd($list->user_id . $list->username . $list->zcsj);
        cookie('uid', $list->user_id, 31536000);
        cookie('validate', $validate, 2592000);
    }
}
?>
            <script type="text/javascript">
            function logout(){
                window.location.href = "logout";
            }
            function create(){
                window.location.href = "create";
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
                <a href="javascript:void(0)" onclick="<?php echo empty($list->username)?"create":"logout";?>()" class="exitLink"><?php echo empty($list->username)?"注册":"退出";?></a>
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
<head>
    <style>
h3 {
    padding: 0 15px;
    font-weight: 800;
    font-size: 20px;
    color: #333;
    line-height: 4em;
}
h3 span {
    border-bottom: solid 1px #333;
}
.article table {
    margin: 0 15px;
}    
table {
    border: 1px solid #ccc;
    border-collapse: collapse;
}
table th {
    height: 30px;
    line-height: 30px;
    font-size: 12px;
    text-align: left;
    padding: 0 6px 0 10px;
    border: 1px solid #ccc;
    background: #eef4fe;
}
table td {
    height: 30px;
    font-size: 12px;
    line-height: 20px;
    padding: 0 6px 0 10px;
    border: 1px solid #ccc;
}
#mw-content-text p {
    padding: 0px 15px;
}
p {
    margin: 6px 0;
    text-align:center;
}
.mw-code {
    padding: 10px 15px;
    background: #fafafa;
    margin: 10px 15px;
}
.co1 {
    color: #006600;
    /*font-style: italic;*/
}
    </style>
</head>


<h3><span>插入数据接口(POST)</span></h3>
<p><b>请求url</b></p>
<div class="mw-code">
<span class="co1">http://10.105.2.203/api/map/add &nbsp; &nbsp; // POST请求</span>
</div>
<p><br><b>请求参数</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="220"> 备注</th>
    </tr>
    <tr>
        <td>lng</td>
        <td>经度</td>
        <td>float</td>
        <td>最多6位小数，3位整数，必选</td>
    </tr>
    <tr>
        <td>lat</td>
        <td>纬度</td>
        <td>float</td>
        <td>最多6位小数，3位整数，必选</td>
    </tr>
    <tr>
        <td>apikey</td>
        <td>用户的访问权限key</td>
        <td>string(32)</td>
        <td>必选</td>
    </tr>
</tbody>
</table>
<p><br><b>响应参数（json格式）</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="200"> 备注</th>
    </tr>
    <tr>
        <td>status</td>
        <td>状态码</td>
        <td>int</td>
        <td>1 : 成功,并在message中返回id<br/>-1 : 失败</td>
    </tr>
    <tr>
        <td>message</td>
        <td>响应的信息</td>
        <td>int</td>
        <td>201 : APIKey error<br/>202 : lng error<br/>203 : lat error<br/>204 : data insertion failure<br/>205 : APIKey is empty</td>
    </tr>
</tbody>
</table>
<p><br><b>请求响应示例</b></p>
<p><img src="/static/photo/map/add-post.png" alt="add-post.jpg"></p>


<h3><span>插入数据接口(GET)</span></h3>
<p><b>请求url</b></p>
<div class="mw-code">
<span class="co1">http://10.105.2.203/api/map/add &nbsp; &nbsp; // GET请求</span>
</div>
<p><br><b>请求参数</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="220"> 备注</th>
    </tr>
    <tr>
        <td>lng</td>
        <td>经度</td>
        <td>float</td>
        <td>最多6位小数，3位整数，必选</td>
    </tr>
    <tr>
        <td>lat</td>
        <td>纬度</td>
        <td>float</td>
        <td>最多6位小数，3位整数，必选</td>
    </tr>
    <tr>
        <td>apikey</td>
        <td>用户的访问权限key</td>
        <td>string(32)</td>
        <td>必选</td>
    </tr>
</tbody>
</table>
<p><br><b>响应参数（json格式）</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="200"> 备注</th>
    </tr>
    <tr>
        <td>status</td>
        <td>状态码</td>
        <td>int</td>
        <td>1 : 成功,并在message中返回id<br/>-1 : 失败</td>
    </tr>
    <tr>
        <td>message</td>
        <td>响应的信息</td>
        <td>int</td>
        <td>201 : APIKey error<br/>202 : lng error<br/>203 : lat error<br/>204 : data insertion failure<br/>205 : APIKey is empty</td>
    </tr>
</tbody>
</table>
<p><br><b>请求响应示例</b></p>
<p><img src="/static/photo/map/add-get.png" alt="add-get.jpg"></p>


<h3><span>查询数据接口(POST)</span></h3>
<p><b>请求url</b></p>
<div class="mw-code">
<span class="co1">http://10.105.2.203/api/map/get &nbsp; &nbsp; // POST请求</span>
</div>
<p><br><b>请求参数</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="220"> 备注</th>
    </tr>
    <tr>
        <td>apikey</td>
        <td>用户的访问权限key</td>
        <td>string(32)</td>
        <td>必选</td>
    </tr>
</tbody>
</table>
<p><br><b>响应参数（json格式）</b></p>
<table>
<tbody>
    <tr>
        <th colspan="2" width="150"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="150"> 备注</th>
    </tr>
    <tr>
        <td colspan="2">status</td>
        <td>状态码</td>
        <td>int</td>
        <td>1 : 成功<br/>-1 : 失败</td>
    </tr>
    <tr>
        <td colspan="2">message</td>
        <td>响应的信息</td>
        <td>int</td>
        <td>200 : successful<br/>201 : APIKey error<br/>202 : Data is empty<br/>203 : query failure</td>
    </tr>
    <tr>
        <td rowspan="6" width="40"> data
        </td>
        <td>map_id</td>
        <td>map表的主键</td>
        <td>int</td>
        <td></td>
    </tr>
    <tr>
        <td>lng</td>
        <td>经度</td>
        <td>float</td>
        <td></td>
    </tr>
    <tr>
        <td>lat</td>
        <td>纬度</td>
        <td>float</td>
        <td></td>
    </tr>
    <tr>
        <td>create_time</td>
        <td>创建时间</td>
        <td>datetime</td>
        <td></td>
    </tr>
    <tr>
        <td>ip</td>
        <td>上传时的IP</td>
        <td>string</td>
        <td></td>
    </tr>
    <tr>
        <td>uid</td>
        <td>用户id</td>
        <td>int</td>
        <td></td>
    </tr>
</tbody>
</table>
<p><br><b>请求响应示例</b></p>
<p><img src="/static/photo/map/get-post.png" alt="get-post.jpg"></p>


<h3><span>查询数据接口(GET)</span></h3>
<p><b>请求url</b></p>
<div class="mw-code">
<span class="co1">http://10.105.2.203/api/map/get &nbsp; &nbsp; // GET请求</span>
</div>
<p><br><b>请求参数</b></p>
<table>
<tbody>
    <tr>
        <th width="80"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="220"> 备注</th>
    </tr>
    <tr>
        <td>apikey</td>
        <td>用户的访问权限key</td>
        <td>string(32)</td>
        <td>必选</td>
    </tr>
</tbody>
</table>
<p><br><b>响应参数（json格式）</b></p>
<table>
<tbody>
    <tr>
        <th colspan="2" width="150"> 参数名</th>
        <th width="150"> 参数含义</th>
        <th width="100"> 类型</th>
        <th width="150"> 备注</th>
    </tr>
    <tr>
        <td colspan="2">status</td>
        <td>状态码</td>
        <td>int</td>
        <td>1 : 成功<br/>-1 : 失败</td>
    </tr>
    <tr>
        <td colspan="2">message</td>
        <td>响应的信息</td>
        <td>int</td>
        <td>200 : successful<br/>201 : APIKey error<br/>202 : Data is empty<br/>203 : query failure</td>
    </tr>
    <tr>
        <td rowspan="6" width="40"> data
        </td>
        <td>map_id</td>
        <td>map表的主键</td>
        <td>int</td>
        <td></td>
    </tr>
    <tr>
        <td>lng</td>
        <td>经度</td>
        <td>float</td>
        <td></td>
    </tr>
    <tr>
        <td>lat</td>
        <td>纬度</td>
        <td>float</td>
        <td></td>
    </tr>
    <tr>
        <td>create_time</td>
        <td>创建时间</td>
        <td>datetime</td>
        <td></td>
    </tr>
    <tr>
        <td>ip</td>
        <td>上传时的IP</td>
        <td>string</td>
        <td></td>
    </tr>
    <tr>
        <td>uid</td>
        <td>用户id</td>
        <td>int</td>
        <td></td>
    </tr>
</tbody>
</table>
<p><br><b>请求响应示例</b></p>
<p><img src="/static/photo/map/get-get.png" alt="get-get.jpg"></p>

<br/><br/>
</div>
</center>
<div class="copyright">
    <center>Copyright &copy; <?php echo date("Y");?> 物联网智能管理平台</center>
</div>
</body>
</html>
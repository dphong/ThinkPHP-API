<?php
namespace app\admin\controller;
use think\Request;
use think\Controller;

class Map extends Controller
{
    public function index()
    {
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //$data = $request->post('lng');
        //return $data;
        session_start();
        $_SESSION['lngErr'] = "";
        $_SESSION['latErr'] = "";
        $lngErr = $latErr = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if( empty($_POST["lng"])){
                $lngErr = "  经度是必填的";
            } else {
                $_SESSION['lng']=test_input($_POST["lng"]);
                if (!preg_match("/^(((\d|[1-9]\d|1[1-7]\d|0)\.\d{0,4})|(\d|[1-9]\d|1[1-7]\d|0{1,3})|180\.0{0,4}|180)$/",$_SESSION['lng'])){
                    $lngErr = "  无效的经度格式!";
                }
            }
            if( empty($_POST["lat"])){
                $latErr = "  纬度是必填的";
            } else {
                $_SESSION['lat']=test_input($_POST["lat"]);
                if (!preg_match("/^([0-8]?\d{1}\.\d{0,4}|90\.0{0,4}|[0-8]?\d{1}|90)$/",$_SESSION['lat'])){
                    $latErr = "  无效的纬度格式!";
                }
            }
            if ($lngErr != "" || $latErr != ""){
                //echo '<script language=javascript>window.location.href="position.php"</script>';
                $_SESSION['lngErr'] = $lngErr;
                $_SESSION['latErr'] = $latErr;
                //$this->error('错误提示页面跳转','admin/map/position');
                echo '<script language=javascript>window.location.href="position"</script>';
            }
            $point = "point = new BMap.Point($_SESSION(lng),$_SESSION(lat));";
        } else {
            $point =  'point = new BMap.Point(117.234877,31.756886);';
        }
        //echo '<script language=javascript>map.centerAndZoom(point,17);</script>';
        $this->assign('point', $point);
        if (!empty($_SESSION['lng']))
            $this->assign('setMarker',"setMarker($_SESSION(lng),$_SESSION(lat));");
        else
            $this->assign('setMarker',"setMarker(117.234877,31.756886);");
        return $this->fetch();
    }
    
    public function position() {
        session_start();
        //echo $_SESSION['lngErr'];
        if(!empty($_SESSION['lngErr']) || !empty($_SESSION['latErr']))
        {
            $this->assign('lngErr',$_SESSION['lngErr']);
            $this->assign('latErr',$_SESSION['latErr']);
            $this->assign('lng', $_SESSION['lng']);
            $this->assign('lat',$_SESSION['lat']);
        } else
        {
            $this->assign('lngErr',"");
            $this->assign('latErr',"");
            $this->assign('lng', "");
            $this->assign('lat',"");
        }
        //echo '';
        $_SESSION['lngErr']=$_SESSION['latErr']="";
        return $this->fetch();
    }
}
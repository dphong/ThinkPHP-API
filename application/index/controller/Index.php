<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Url;
use think\Log;
use app\index\model\Users;
use app\index\model\UserLevel;
use app\index\model\Test;
use app\index\model\Region;
use app\index\model\ShippingArea;
use org\util\ArrayList;
use app\common\util\Myclass;
use think\Session;
use think\Cookie;
class Index extends Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->view->replace(['__PUBLIC__'    =>  '/static',]);
    }
  
    public function test41(){
        // 设置
        // 
        // 设置Cookie 有效期为 3600秒
//        Cookie::set('user_name','TPshop 团队',3600);
//        // 设置cookie 前缀为think_
//        Cookie::set('user_name','TPshop 老师',['prefix'=>'think_', 'expire'=>3600]);
//        // 支持数组        
//        Cookie::set('Teacher',['zhang','wang','chen','peng']);                                        
//        echo Cookie::get('user_name'); // 也支持使用Cookie类直接读取        
//        echo "<br/>";
//        // 获取指定前缀的cookie值
//        echo Cookie::get('user_name','think_');        
//        echo "<br/>"; 
//        // 建议的读取Cookie数据的方法是通过Request请求对象的cookie方法
//        echo $this->request->cookie('user_name');        
//        echo "<br/>";                 
//        
       // 判断  
//        echo Cookie::has('user_name');
//        echo "<br/>";
        // 判断指定前缀的cookie值是否存在
//        echo Cookie::has('user_name','think_'); 
//        echo "<br/>";
//       
//       //删除cookie
         //Cookie::delete('user_name');
//       // 删除指定前缀的cookie
         //Cookie::delete('user_name','think_');
//       
//       // 清空
//       // 清空指定前缀的cookie
         //Cookie::clear('think_');
//       
//       // 助手函数
//        // 初始化
          //cookie(['prefix' => 'think_', 'expire' => 3600]);
//        // 设置
          //cookie('name', 'value123', 3600);
//        // 判断
          //echo cookie('?name');
          //echo "<br/>";
//        // 获取
          //echo cookie('name');
          //echo "<br/>";
//        // 删除
          //cookie('name', null);
//        // 清除
          //cookie(null, 'think_');
    }
    
    
    public function test40(){
        session_start();
        echo $_SESSION['aa'];
        exit;
        $_SESSION['aa'] = 22;
        setcookie("bb",'55');
    }
    
    // 模板输出
    public function test39(){
        
        Session::set('user_name','Thinkphp 团队');
        return $this->fetch();
        //echo $request->session('user_name');
        // 读取二维数组
        //echo $request->session('user.name');      
        
        //print_r($_SESSION);
    }
    
    // 助手函数
    public function test38(){
                
        // 赋值（当前作用域）
        //session('name', 'thinkphp');
        //echo $this->request->session('name');
        
        // 赋值think作用域
        //session('name', 'thinkphp', 'think');
        // 判断（当前作用域）是否赋值
        //echo session('?name');
        // 取值（当前作用域）
        //echo session('name');
        // 取值think作用域
        //echo session('name', '', 'think');
        // 删除（当前作用域）
        //session('name', null);
        // 清除session（当前作用域）
        //session(null);
        // 清除think作用域
        //session(null, 'think');      
        
        echo "\n";
        print_r($_SESSION);
    }    
    
    // SESSION操作
    public function test37(){         
        // 赋值（当前作用域）
        //Session::set('name','thinkphp');
        // 赋值think作用域
        //Session::set('name','thinkphp','think2');
        // 判断（当前作用域）是否赋值
        //echo Session::has('name');
        // 判断think作用域下面是否赋值
        //echo Session::has('name','think');
        // 取值（当前作用域）
        //echo Session::get('name');
        // 取值think作用域
        //echo Session::get('name','think');
        // 指定当前作用域
        //Session::prefix('think2');
        // 删除（当前作用域）
        //echo Session::delete('name');
        //echo Session::get('name','think');
        // 删除think作用域下面的值
        //Session::delete('name','think');
        // 清除session（当前作用域）
        //Session::clear(); 
        // 清除think作用域
        //Session::clear('think2');
        // 赋值（当前作用域）
        //Session::set('name.item','thinkphp');
        // 判断（当前作用域）是否赋值
        //echo Session::has('name.item');
        // 取值（当前作用域）
        //echo Session::get('name.item');
        // 删除（当前作用域）
        Session::delete('name.item');     
        //$_SESSION = [];
         echo "\n";
         print_r($_SESSION);
         exit;
    }      
    

    
    public function test36(){
        try {
           // 错误运营代码
            100 / 0;
        } catch (\think\Exception $ex) {
            Log::error('测试错误');     
        }       
    }     
    
    public function test35(){
       $myclass = new Myclass();
       echo $myclass->hello();
    }        
    
    public function test34(){
        $list       = ['thinkphp', 'thinkphp5', 'TPshop'];
        $arrayList  = new ArrayList($list);
        $arrayList->add('kancloud');        
        dump($arrayList->toArray());
        echo $arrayList->toJson();
    }    
    public function test33(){
        echo my_fun();
    }
    
    
    public function test32(){
        Log::error('错误信息111');
        Log::info('日志信息222');
        trace('错误信息3333','error');
        trace('日志信息4444','info');
    }        

    public function test31(){
        trace('测试');
        trace(['a', 'b', 'c']);
        trace(Users::get());
    }    
       
    public function test30(){
        dump('测试');
        halt(['a', 'b', 'c']);
        halt('这里的信息是不会输出的'); 
    }    
    
    public function test29(){
        trace('这是测试调试信息');
        trace([1,2,3]);       
    }
    
    //温故而知新
    public function test25(){
        
        dump('测试');
        halt(['a', 'b', 'c']);
        halt('这里的信息是不会输出的');        
        return ;
        $list = Users::where('user_id','>' ,2596)->select();
        $this->assign('list',$list);
        $this->assign('count', count($list));
        return $this->fetch();
    } 
    // 分页输出列表
    public function test26(){
        
        dump('测试');
        dump(['a', 'b', 'c']);
        dump(Users::get());        
        return ;
        $list = Users::paginate(3); //  每页显示3条数据        
        $this->assign('list2',$list);
        $this->assign('count', count($list));       
        return $this->fetch();
    } 
    // 公共模板  模板定位
    public function test27(){
        
        return 'hello,'.$_GET['name'];
        
        $list = Users::where('user_id','>' ,2596)->select();
        $this->assign('list',$list);
        $this->assign('count', count($list));
        return $this->fetch();
    }  
    // 模板布局
    public function test28(){
        trace('这是测试调试信息');
        trace([1,2,3]);        
        $list = Users::where('user_id','>' ,2596)->select();
        $this->assign('list',$list);
        $this->assign('count', count($list));        
        return $this->fetch();
    }     
    
    public function  test24()
    {
        $user = Users::get(1);
        dump($user->toArray());    // 数组输出    
        dump($user->hidden(['reg_time','last_login'])->toArray());    // 隐藏属性数组输出
        dump($user->visible(['user_id','nickname','email'])->toArray());   // 指定属性输出                                        
        dump($user->append(['user_status'])->toArray());
        echo $user->toJson();
        echo Users::get(1);
        
    }
    
    public function  test20()
    {
            // 多对多关联
//            tp_region  地区表
//            tp_shipping_area 物流配置表   珠三角   全国一线城市
//            tp_area_region   地区对应表    
        // 关联新增     
        //给某个地区增加编辑配送区域，并且由于这个配送区域还没创建过，所以可以使用下面的方式：
        $region = Region::getByName('北京市');
        // 新增配送区域 并自动写入枢纽表
        $region->shippingArea()->save(['shipping_area_name' => '中国首都','shipping_code'=>'shentong']);
        
            // 给当前用户新增多个用户角色
             $region->shippingArea()->saveAll([
                 ['shipping_area_name' => '珠三角', 'shipping_code' => 'shufeng'],
                 ['shipping_area_name' => '全国一线城市', 'shipping_code' => 'shufeng'],
             ]);        
        return '配送区域新增成功';
                    
                //给一个地区 添加一个现有的配送区域
//                $region = Region::getByName('北京市');
//                $shippingArea = ShippingArea::getByShippingAreaName("中国首都23"); //ShippingAreaName
//                // 添加枢纽表数据
////                $region->shippingArea()->attach($shippingArea); // 使用attach方法增加中间表的关联数据
//                $region->shippingArea()->attach(63);
//        return '配送区域新增成功';                
 
              // 关联删除
//                $region = Region::getByName('北京市');
//                $shippingArea = ShippingArea::getByShippingAreaName("中国首都23"); //ShippingAreaName
                // 删除关联数据 但不删除关联模型数据
                //$region->shippingArea()->detach($shippingArea);
                // 如果有必要，也可以删除枢纽表的同时删除关联模型
                //$region->shippingArea()->detach($shippingArea,true);
                // return '配送区域删除成功';        
          
//                $region = Region::getByName('北京市');
//                //print_r($region->shippingArea);
//                echo $region->shippingArea[0]->shipping_area_name.'===';
//                echo $region->shippingArea[0]->shipping_code;
        
//                  $region = Region::get(1,'shippingArea');  
//                  //dump($region->shippingArea);
//                  echo $region->shippingArea[0]->shipping_area_name.'===';
//                  echo $region->shippingArea[0]->shipping_code;
                  
    }

//    // 查询范围
//    public function test(){
////        $list = Users::scope('email,level')->all();
////        print_r($list);
//        
//        $list = Users::scope('email') // 可带参数 ,'132456'
//        ->scope('level')
//        ->scope(function ($query) {
//            $query->order('user_id', 'desc');
//        })
//        ->all();        
//        print_r($list);
//    }
        
    public function readFun(){

        $user = Users::get(1);
//        echo $user->nickname . '<br/>';
//        echo $user->email . '<br/>';    // 自动检测 getEmailAttr
//        echo $user->reg_time . '<br/>'; // 自动检测 getRegTimeAttr
//        $user->reg_time = '2017-10-10';
//        echo $user->reg_time . '<br/>'; // 修改器修改之后
        
          //echo $user->birthday. '<br/>'; // 类型转换
//          $user->birthday = '2017-11-04'; // 类型转换          
//          $user->save();
        
//          $user->sex = 1; // 类型转换          
//          $user->save();

        //Users::create(['email'=>'1324567@798.com']);  自动完成
        
    }
    
    public function testModel(){
        
        //Test::get(1);
        //Users::get(1);
        //UserLevel::get(1);
        //echo "public function testModel(){";    
//        插入操作        
//        $users = new Users;
//        $users->email = '123456@abc.com';
//        $users->mobile = '123456';
//        //$users->aaaa = '123456';
//        $users->save();
//      换种方法插入操作        
//        $userArr['email'] = 'hello@world.com';
//        $userArr['mobile'] = '123456789';        
//        if ($result = Users::create($userArr))
//              echo "用户id:{$result->user_id} 邮件:{$result->email} 手机:{$result->mobile}";
//      批量新增
//        $users = new Users;        
//        $list = [
//               ['email' => 'zhanghsan@qq.com', 'mobile' => '123456789'],
//               ['email' => 'lisi@qq.com', 'mobile' => '987654321'],
//           ];
//            if ($users->saveAll($list)) {
//                echo '用户批量新增成功';
//            } 
        
//          查询数据
//            $user = Users::get(1);
//            echo $user->mobile;
//            echo "<br/>";
//            echo $user->email;
//          因为实现了 \ArrayAccess 接口,可以将对象像数组一样来访问           
//            $user = Users::get(2);        
//            echo $user['mobile'];
//            echo "<br/>";
//            echo $user['email'];

//          根据某个条件查询数据 getByXxxx() 方法
//            $user = Users::getByMobile('123456');
//            echo $user['mobile'];
//            echo "<br/>";
//            echo $user['email'];
        
////           如果不是根据主键查询，可以传入数组作为查询条件
//            $user = Users::get(['mobile'=>'13554784574','email'=>'511482696@qq.com']);
//            $user = Users::where('mobile','13554784574')->find();
//            $user = Users::where(['mobile'=>'13554784574','email'=>'511482696@qq.com'])->find();
//            echo $user['mobile'];
//            echo "<br/>";
//            echo $user['email'];      
//            如果要查询多个数据，可以使用模型的all方法          
//              $list = UserLevel::all(); 
//              $list = UserLevel::all(['level_id'=>4]);
//              $list = UserLevel::where('level_id','<=',3)->select();
//              foreach($list as $v)
//              {
//                  echo ' id:'.$v->level_id;
//                  echo '== 等级名称:'.$v->level_name;                  
//                  echo '<br/>';
//              }
////              对于数据库查询出来的数据更新数据        
//                $user           = Users::get(1);
//                $user->mobile   = '987654321';
//                $user->email    = 'helloworld2@qwe.com';
//                //echo $user->user_id;
//                //$user->user_id = null;
//                if (false !== $user->save()) // $user->isUpdate(false)->save()
//                    return '更新用户成功';  
//                 else 
//                    return $user->getError();
                        
//               自己定义是数据更新操作                   
//                  $userArr['mobile'] = '123456798';
//                  $userArr['email']  = '333333@3344444.com';
//                  Users::update($userArr,['user_id'=>1]);        
//                删除操作                    
//                  $user = Users::get(2593);    
//                  $user->delete();         
//                  // 或者使用
//                  Users::destroy(2592);   
    }    
    public function index($name = '张三')
    {               
        //print_r($_GET);
        //print_r($_POST);
        //$data = Db::name('users')->find();
        //print_r($data);
	//$this->assign('name', $name);
        //return $this->fetch();
        return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p> ThinkPHP V5<br/><span style="font-size:30px">十年磨一剑 - 为API开发设计的高性能框架</span></p><span style="font-size:22px;">[ V5.0 版本由 <a href="http://www.qiniu.com" target="qiniu">七牛云</a> 独家赞助发布 ]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
         
    }
    
    public function hello($name = 'world')
    {
        echo "hello:".$name;
        echo "<br/>";
        print_r($this->request->param());
    }
        
    public function today($year='2017', $month='10')
    {
        
        echo "今天是 $year 年 $month 月";
        //print_r($this->request->param());
   //  return 'index2';
    }
    
    public function url()
    {
         echo Url::build('url2', 'a=1&b=2');
         echo "<br/>";
         echo url('url2', 'a=1&b=2');
         echo "<br/>";
         echo url('url2', ['a'=>1,'b'=>'2']);
         echo "<br/>";
         echo url('url2', array('a'=>1,'b'=>'2'));
         echo "<br/>";
         echo url('admin/index2/url2', 'a=1&b=2');
         echo "<br/>";
         echo url('admin/HelloWorld/hello'); // 自动切换 url_convert
         echo "<br/>";
         echo url('today/2017/07'); // 路由规则
         echo "<br/>";         
    }     
    public function url2()
    {
        print_r($this->request->param());
    }     
    
   public function hello5()
    {
        /* 1 配置数据库
         * 2 使用DB 命名空间
         * 
         */ 
        
        // 插入记录
//        $result = Db::execute('insert into tp_data (id, name ,status) values (1, "1111",1)');
//        dump($result);   
        // 更新记录
//        $result = Db::execute('update tp_data set name = "framework" where id = 1 ');
//        dump($result);        
        // 查询数据
//        $result = Db::query('select * from tp_data where id = 1');
//        print_r($result);
        // 删除数据
        //$result = Db::execute('delete from tp_data where id = 5 ');
        //dump($result);     
        //其它操作
        // 显示数据库列表
//        $result = Db::query('show tables from tpshop1');
//        print_r($result);
        // 清空数据表
        //$result = Db::execute('TRUNCATE table tp_data');
        //dump($result);   
//         $result = Db::connect('db2')->query('select * from tp_data where id = 1');
//         print_r($result);
//         $result = Db::connect('db3')->query('select * from tp_data where id = 1');        
//         print_r($result);    
        
//        $db1 = Db::connect('db1');
//        $db2 = Db::connect('db2');
//        $db1->query('select * from tp_data where id = 1');
//        $db2->query('select * from tp_data where id = 1');
         
        //参数绑定
//        Db::execute('insert into tp_data (id, name ,status) values (?, ?, ?)', [3, 'thinkphp', 1]);
//        $result = Db::query('select * from tp_data where id = ?', [3]);
//        print_r($result);    
       //命名占位符绑定
//        Db::execute('insert into tp_data (id, name , status) values (:id, :name, :status)', ['id' => 11, 'name' => 'thinkphp', 'status' => 1]);
//        $result = Db::query('select * from tp_data where id=:id', ['id' => 10]);
//        print_r($result);        
        // 查询构造器
        // 插入记录
       // Db::table('tp_data')->insert(['id' => 6, 'name' => 'thinkphp', 'status' => 1]);

        // 更新记录
//        Db::table('tp_data')
//            ->where('id', 2)
//            ->update(['name' => "hello"]);

        // 查询数据
//        $list = Db::table('tp_data')
//            ->where('id', 18)
//            ->select();

        // 删除数据
//        Db::table('tp_data')
//            ->where('id', 18)
//            ->delete();       
       
      // 插入记录
     // Db::name('data')->insert(['id' => 7, 'name' => '77777777777777']); 
       
       //链式操作
        // 查询十个满足条件的数据 并按照id倒序排列
//        $list = Db::name('data')
//                ->where('status', 1)
//                ->field('id,name')
//                ->order('id', 'desc')
//                ->limit(10)
//                ->select();
//        print_r($list);
        
       //事务支持 在Mysql数据库中请设置表类型为InnoDB
       //把需要执行的事务操作封装到闭包里面即可自动完成事务
//        Db::transaction(function () {
//            Db::table('tp_data')->delete(2);
//            Db::table('tp_data')->insert(['id' => 9, 'name' => 'thinkphp', 'status' => 1]);
//        });       
       // 手动控制事务的提交
        // 启动事务
//        Db::startTrans();
//        try {
//            Db::table('tp_data')
//                ->delete(2);
//            Db::table('tp_data')
//                ->insert(['id' => 11, 'name' => 'thinkphp', 'status' => 1]);
//            // 提交事务
//            echo 'try';
//            Db::commit();
//        } catch (\Exception $e) {
//            // 回滚事务
//            echo 'catch';
//            Db::rollback();
//        }       
       
       
    }
    
    
    public function hello6()
    {
        //$result = Db::name('data')->where('id', 4)->find();
        
        // 可以写成 >= <= <>  in [4,5,6,7,8]  'between', [5, 8]
//        $result = Db::name('data')->where('id','between', [1,9])->select();
//        print_r($result);
        
        //查询某个字段是否为NULL
//        $result = Db::name('data')
//            ->where('name', 'null')
//            ->select();
//        print_r($result);            
                
        // 使用EXP条件表达式，表示后面是原生的SQL语句表达式
//        $result = Db::name('data')->where('id','exp', " > 1 and name = '111'")->select(); 
//        print_r($result);
        
        //使用多个字段查询：
//        $result = Db::name('data')
//                ->where('id', '>=', 1)
//                ->where('name', 'like', '%php%')
//                ->select();
//        print_r($result);   
         // 或者使用
//        $result = Db::name('data')
//            ->where([
//                'id'   => ['>=', 1],
//                'name' => ['like', '%think%'],
//            ])->select();
//        print_r($result);          
//        
        // 再来看一些复杂的用法，使用OR和AND混合条件查询
//        $result = Db::name('data')        
//            ->where('name', 'like', '%think%')
//            ->where('id', ['in', [1, 2, 3]], ['>=', 1], 'or')
//            ->limit(2)
//            ->select();
//        print_r($result);           
              
        // 批量查询
//        $result = Db::name('data')
//            ->where([
//                'id'   => [['in', [1, 2, 3]], ['>=', 1], 'or'],
//                'name' => ['like', '%php%'],
//            ])
//            ->limit(10)
//            ->select();
//        print_r($result);   
         //快捷查询
//        $result = Db::name('data')
//            ->where('id&status', '>', 0)
//            ->limit(10)
//            ->select();
//        print_r($result);          

//            $result = Db::name('data')
//                ->where('id|status', '>', 0)
//                ->limit(10)
//                ->select();
//            print_r($result);            
        
       
    }
    
    public function hello7()
    { // 视图查询
//        $result = Db::view('data','id,name,status')
//            ->view('users',['nickname'=>'user_name','mobile','email'],'users.user_id = data.id')
//            ->where('data.status',1)
//            ->order('id desc')
//            ->select();
//        print_r($result);       

//        create view my_view(id, `name`, `status`, user_name,mobile,email) 
//        as 
//        select data.id,data.name,data.status,users.nickname as user_name,users.mobile,users.email 
//        from tp_data `data` inner join tp_users users on users.user_id = data.id where data.status = 1 order by data.id desc 
//        select * from my_view         
        
          // 使用Query对象
//        $query = new \think\db\Query;
//        $query->name('data')->where('name', 'like', '%think%')
//            ->where('id', '>=', '1')
//            ->limit(10);
//        $result = Db::select($query);  
//        print_r($result);        
        
        // 获取某行某列某个值
//        $name = Db::name('data')->where('id', 16)->value('name');
//        print_r($name);      
//        
        // 获取某列
//        $name = Db::name('data')
//            ->where('status', 1)
//            ->column('name');
//        print_r($name);     
                
        // 获取id键名 name 位值的 键值对
//        $list = Db::name('data')
//            ->where('status', 1)
//            ->column('name', 'id');
//        print_r($list);            
        
        // 获取id键名 的数据集
//        $list = Db::name('data')
//            ->where('status', 1)
//            ->column('*', 'id');
//        print_r($list);            
 
         // 聚合查询  count  max min avg sum     
        // 统计data表的数据
//        $count = Db::name('data')->where('status', 1)->count();
//        echo $count;    
        
        // 统计data表的最大id
//        $max = Db::name('data')->where('status', 1)->max('id');
//       echo $max; 
        
       // 建议字符串 简单查询
//        $result = Db::name('data')
//            ->where("id > :id and name  like :name", ['id' => 10,'name'=>"%php%"])
//            ->select();
//        print_r($result);            
        
        // 日期查询 建议 日期类型 使用 int
        // 查询时间大于2016-1-1的数据
//        $result = Db::name('users')
//            ->whereTime('reg_time', '>', '2016-01-01')
//            ->select();
//        print_r($result);

//        // 查询本周
//        $result = Db::name('users')
//            ->whereTime('reg_time', '>', 'this week')
//            ->select();
//        print_r($result);
//
//        // 查询最近两天添加的数据
//        $result = Db::name('users')
//            ->whereTime('reg_time', '>', '-2 days')
//            ->select();
//        print_r($result);
//
//        // 查询创建时间在2016-1-1~2017-7-1的数据
//        $result = Db::name('users')
//            ->whereTime('reg_time', 'between', ['2016-1-1', '2017-1-1'])
//            ->select();
//        print_r($result);    
        
        // 获取今天的数据  昨天 yesterday   本周 week  上周 last week
//        $result = Db::name('users')
//            ->whereTime('reg_time', 'today')
//            ->select();
//        print_r($result);          
//        
          // 分块查询        
//           Db::name('data')
//            ->where('status', '>', 0)
//            ->chunk(2, function ($list) {                
//                foreach($list as $data){
//                   // 处理2条记录   
//                }
//            });   
            
//            改造后     
        $p = 0;
        do{               
               $result = Db::name('data')->limit($p,2)->select();
               $p += 2;
                print_r($result);
                // 逻辑处理
        } while (count($result) > 0);
        
        
    }    
    
}

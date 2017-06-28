<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Url;
use think\Log;
use think\Request;
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
  
    //我要寄件
    public function send()
    {            
        return $this->fetch();
    }
    
    //快递单数据库内容
    public function sql() {
        return $this->fetch();
    }
    
    //智能物流系统
    public function iot() {
        return $this->fetch();
    }

    // 控制器验证
    public function add()
    {
        $data = input('post.');
        $result = $this->validate($data,'Users');   // 数据验证
        if(input('post.flag')==1)
        {
            if (true !== $result) {
                echo "<script language=javascript>alert ('" . $result  ."');</script>";
                echo '<script language=javascript>window.location.href="/create"</script>';
                return;
            }
        } else if(input('post.flag')==2)
        {
            if (true !== $result) {
                return json(array(
                    'status' => -1,
                    'message'    => $result,
                ));
                //echo "<script language=javascript>alert ('" . $result  ."');</script>";
                //echo '<script language=javascript>window.location.href="/create"</script>';
                return;
            }
        } else {
                echo "<script language=javascript>alert ('错误的提交');</script>";
                echo '<script language=javascript>window.location.href="/send"</script>';
                return;
        }
        $users = new Users;
        $users->allowField(true)->save($data);  // 数据保存
        $id = $users->user_id;
        $users->apikey = createApi($id);    //根据ID创建API并保存
        $users->password = createPasswd(input('post.password'));
        $users->zcsj = time();
        $users->save($users);
        if(input('post.flag')==1){
            $this->success('创建用户成功，请登录，页面跳转中...','/login');
        }else{
            return json(array(
                'status' => 1,
                'message'    => '用户创建成功',
            ));
        }
    }
    
    public function check()
    {
        $request = Request::instance();
        $post_data = input('post.');
        echo '<center>';
        echo '</br><h3>POST:</h3></br><h2>';
        dump($post_data);
        $get_data = input('get.');
        echo '</h2></br></br><h3>GET:</h3></br><h2>';
        dump($get_data);
        echo '</h2></center>';
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

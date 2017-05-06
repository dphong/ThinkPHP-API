<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Index4 extends Controller
{
    public function hello()
    {     
        $request = Request::instance();        
        echo $request->url(); // 获取当前URL地址 不含域名
        echo "<br/>";
        echo $this->request->url(); // 获取当前URL地址 不含域名
        echo "<br/>";
        echo $this->request->bind('user_name','张三2222'); //  动态绑定属性
        echo "<br/>";
        echo $this->request->user_name; // 其他控制器中可以直接使用 如果不在控制器中 可以 $request->user_name;       
        echo "<br/>";
        echo request()->url(); // 为了简洁 方便可以使用 函数助手
        echo "<br/>";
        /**请求变量信息**/
        print_r($request->param());
        echo "<br/>";
        echo $request->param('name');
        echo "<br/>";
        print_r(input());  // 为了简洁 方便可以使用 函数助手
        echo "<br/>";
        echo input('name');
        echo "<br/>";
        /****param方法支持变量的过滤和默认值***/
        echo $request->param('en_name','jake','strtolower');
        echo "<br/>";
        /***指定获取参数**/  // http://www.tp5.com/admin/index4/hello.html?name=1111&en_name=LUXI
        echo "============request=================<br/>";
        echo 'GET参数：';
        print_r($request->get()); echo "<br/>";
        echo 'GET参数：name:';
        print_r($request->get('name'));echo "<br/>";
        echo 'POST参数：name:';
        print_r($request->post('name'));echo "<br/>";
        echo 'cookie参数：name:';
        print_r($request->cookie('name'));echo "<br/>";
        echo '上传文件信息：image:';
        print_r($request->file('image'));echo "<br/>";  
        /**相同的input 也一样 **/
        echo "============input=================<br/>";
        echo 'GET参数：';
        print_r(input('get.'));echo "<br/>";
        echo 'GET参数：name:';
        print_r(input('get.name'));echo "<br/>";
        echo 'POST参数：name:';
        print_r(input('post.name'));echo "<br/>";
        echo 'cookie参数：name:';
        print_r(input('cookie.name'));echo "<br/>";
        echo '上传文件信息：image:';
        print_r(input('file.image'));echo "<br/>";       
        
        echo "============request 其他参数=================<br/>";
        echo '请求方法：' . $request->method() . '<br/>';        
        echo '访问IP：' . $request->ip() . '<br/>';
        echo '是否AJax请求：' . ($request->isAjax() ? '是' : '否'). '<br/>';   
        echo '当前域名: ' . $request->domain() . '<br/>';
        echo '当前入口文件: ' . $request->baseFile() . '<br/>';
        echo '包含域名的完整URL地址: ' . $request->url(true) . '<br/>';
        echo 'URL地址的参数信息 : ' . $request->query() . '<br/>';
        echo '当前URL地址 不含QUERY_STRING' . $request->baseUrl() . '<br/>';
        echo 'URL地址中的pathinfo信息: ' . $request->pathinfo() . '<br/>';
        echo 'URL地址中的后缀信息 ' . $request->ext() . '<br/>';
        echo "============request 当前模块/控制器/操作信息=================<br/>";
        echo '模块：'.$request->module(). '<br/>';
        echo '控制器：'.$request->controller(). '<br/>';
        echo '方法：'.$request->action(). '<br/>';        
    } 
    
    public function hello2()
    {              
       $data = ['name' => 'thinkphp', 'status' => '1'];
       //return $data;
      // return json($data);
       //return json($data,201);
       //return xml($data);
       //$this->assign('name','渲染 模板');
       //return $this->fetch('index/index2');
       //return 'dbashjdghasdghasdg';
    }  
    
    // 页面跳转
    public function hello3()
    {     
        //$this->success('正确的页面跳转','hello');
        //$this->error('错误提示页面跳转','/admin/index4/hello.html?name=1111&en_name=LUXI');
        //$this->redirect('http://www.tp-shop.cn');
        $this->redirect('http://www.baidu.com');
    }  
    
    
    
}

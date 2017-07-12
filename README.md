智能物流管理平台
===============

> V1.1.3 因启用HTTPS，外链为HTTP协议时，不能正常使用，故为静态文件搭建一个静态文件服务器,同时为了兼容HTTP协议，使用时增加了是否为HTTPS的判断。

> V1.1.2 用户登录和注册界面，增加Ajax验证和验证码。

> V1.1.1 将CSS、JS、IMAGE等静态文件修改为外链，提高访问速度。

> V1.1.0 修复静态文件BUG。

详细开发文档参考 [ThinkPHP5完全开发手册](http://www.kancloud.cn/manual/thinkphp5)

## 目录结构

目录结构如下：

~~~
www  WEB部署目录（或者子目录）
├─README.md             README文件
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─runtime            应用的运行时目录（可写，可定制）
│  ├─index        		用户模块
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  ├─validate        验证器目录
│  │  └─ ...            更多类库目录
│  ├─api        		应用程序接口模块
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  ├─validate        验证器目录
│  │  └─ ...            更多类库目录
│  ├─admin        		管理员模块
│  │  ├─controller      控制器目录
│  │  ├─view            视图目录
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  └─database.php       数据库配置文件
│
└─public                WEB目录（对外访问目录）
   ├─index.php          入口文件
   ├─static				静态文件目录
   │  ├─css				css样式库
   │  ├─photo			图标，图片目录
   │  └─ ...			更多静态文件目录
   └─.htaccess          用于apache的重写
~~~

> router.php用于php自带webserver支持，可用于快速测试
> 切换到public目录后，启动命令：php -S localhost:8888  router.php
> 上面的目录结构和名称是可以改变的，这取决于你的入口文件和配置参数。

## 命名规范

`ThinkPHP5`遵循PSR-2命名规范和PSR-4自动加载规范，并且注意如下规范：

### 目录和文件

*   目录不强制规范，驼峰和小写+下划线模式均支持；
*   类库、函数文件统一以`.php`为后缀；
*   类的文件名均以命名空间定义，并且命名空间的路径和类库文件所在路径一致；
*   类名和类文件名保持一致，统一采用驼峰法命名（首字母大写）；

### 函数和类、属性命名
*   类的命名采用驼峰法，并且首字母大写，例如 `User`、`UserType`，默认不需要添加后缀，例如`UserController`应该直接命名为`User`；
*   函数的命名使用小写字母和下划线（小写字母开头）的方式，例如 `get_client_ip`；
*   方法的命名使用驼峰法，并且首字母小写，例如 `getUserName`；
*   属性的命名使用驼峰法，并且首字母小写，例如 `tableName`、`instance`；
*   以双下划线“__”打头的函数或方法作为魔法方法，例如 `__call` 和 `__autoload`；

### 常量和配置
*   常量以大写字母和下划线命名，例如 `APP_PATH`和 `THINK_PATH`；
*   配置参数以小写字母和下划线命名，例如 `url_route_on` 和`url_convert`；

### 数据表和字段
*   数据表和字段采用小写加下划线方式命名，并注意字段名不要以下划线开头，例如 `think_user` 表和 `user_name`字段，不建议使用驼峰和中文作为数据表字段命名。

## 参与开发
注册并登录 Github 帐号， fork 本项目并进行改动。

## 如何联系我

邮箱：whark@wlwshow.cn

博客：https://wlwshow.cn

## Contact information

email: whark@wlwshow.cn

Blog：https://wlwshow.cn

## 版权信息

ThinkPHP遵循Apache2开源协议发布，并提供免费使用。

本项目包含的第三方源码和二进制文件之版权信息另行标注。

版权所有Copyright © 2006-2016 by ThinkPHP (http://thinkphp.cn)

All rights reserved。

ThinkPHP® 商标和著作权所有者为上海顶想信息科技有限公司。

更多细节参阅 [LICENSE.txt](LICENSE.txt)
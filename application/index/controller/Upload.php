<?php
namespace app\index\controller;

use think\Image;
use think\Request;

class Upload extends \think\Controller
{

    
    // 文件上传表单
    public function index2()
    {
        //echo ROOT_PATH  .'======='. DS ;
        return $this->fetch();
    }
    
    // 多文件上传表单
    public function index3()
    {
                
        return $this->fetch();
    }    
    
    // 文件上传提交
    public function up(Request $request)
    {
        // 获取表单上传文件
        $file = $request->file('file2');
        //print_r($file);
        //exit;
        // 上传文件验证
        $result = $this->validate(['file2' => $file], ['file2'=>'require|image'],['file2.require' => '请选择上传文件', 'file2.image' => '非法图像文件']);
        //$result = $this->validate(['file2' => $file], ['file2'=>'require|image:100,100,png'],['file2.require' => '请选择上传文件', 'file2.image' => '必须是100*100的PNG格式文件']);        
        if(true !== $result){
            $this->error($result);
        }
        // 移动到框架应用根目录/public/uploads/ 目录下
        //$info = $file->rule('md5')->move(ROOT_PATH . 'public' . DS . 'uploads');
        //$info = $file->rule('date')->move(ROOT_PATH . 'public' . DS . 'uploads');
//        $info = $file->rule(function ($file) {    
//                                return $file->getInfo('type') . date('Y-m-d_H-i-s'); // 使用自定义的文件保存规则
//                            })->move(ROOT_PATH . 'public' . DS . 'uploads');        
        // 如果希望保持上传文件的原文件名保存，则可以使用
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads','');
        
//        print_r($info);
//        exit;
        if ($info) {
            $this->success($info->getSaveName().'文件上传成功：' . $info->getRealPath());
        } else {
            // 上传失败获取错误信息
            $this->error($file->getError());
        }

    }  
    
    public function up3(Request $request){
        // 获取表单上传文件
        $files = $request->file('image');
//        print_r($files);
//        exit;
        $item  = [];
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $item[] = $info->getRealPath();
            }else{
                // 上传失败获取错误信息
                $this->error($file->getError());
            }    
        }
        $this->success('文件上传成功'.implode('<br/>',$item));
    }
    
    
    // 图片上传表单
    public function index()
    {
        return $this->fetch();
    }

    // 图片上传处理
    public function picture(Request $request)
    {
        // 获取表单上传文件
        $file = $request->file('image22');
        //print_r($file);
        //exit;
        if (true !== $this->validate(['image22' => $file], ['image22' => 'require|image'])) {//$this->validate(['image22' => $file,'email333'=>'aaaa@aaa.com'], ['image22' => 'require|image','email333' => 'require|email'])                   
            $this->error('请选择图像文件');
        } else {
            // 读取图片
            $image = Image::open($file);
//            print_r($image);
//            exit;
//            echo "图片的宽度:".$image->width(); echo "<br/>";
//            echo "图片的高度:".$image->height(); echo "<br/>";
//            echo "图片的类型:".$image->type(); echo "<br/>";            
//            echo "图片的mime类型:".$image->mime(); echo "<br/>";
//            // 返回图片的尺寸数组 [ 图片宽度 , 图片高度 ]
//            $size = $image->size();
//            print_r($size);
            
            // 图片处理
            switch ($request->param('type')) {
                case 1: // 图片裁剪 crop(剪裁宽度,剪裁高度,X坐标（默认0）,Y坐标（默认0）)
                    $image->crop(300, 300,0,0);
                    break;
                case 2: // 缩略图 thumb(最大宽度,最大高度,裁剪类型)
                    $image->thumb(150, 150, 1);
                    break;
                case 3: // 垂直翻转
                    $image->flip();
                    break;
                case 4: // 水平翻转  垂直翻转Image::FLIP_X=1  水平翻转 Image::FLIP_Y=2
                    $image->flip(Image::FLIP_Y);
                    break;
                case 5: // 图片旋转 rotate(顺时针旋转的度数)
                    $image->rotate(30);
                    break;
                case 6: // 图片水印 water(水印图片,水印位置常量（默认右下角）,水印透明度（默认100）)
                    $image->water(ROOT_PATH .'logo.png', Image::WATER_NORTHWEST, 50);
                    break;
                case 7: // 文字水印 text(水印文字,字体文件路径,文字大小,文字颜色,文字写入位置,偏移量,文字倾斜角度)
                    $image->text('TPshop', VENDOR_PATH . 'topthink/think-captcha/assets/ttfs/1.ttf', 20, '#ffffff');
                    break;
            }
            // 保存图片（以当前时间戳）
            $saveName = $request->time() . '.png';
            $image->save(ROOT_PATH . 'public/uploads/' . $saveName);
            $this->success('图片处理完毕...', '/uploads/' . $saveName, 1);
        }
    }

}
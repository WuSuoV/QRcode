<?php
/**
 * 二维码生成接口
 *
 * 请求方式   http get
 *
 * 请求字段描述
 * 参数    说明                  类型                                 是否必需
 * c	content             二维码内容 如：http://www.demo.com	 	 是
 * s	size                大小，每像素几个点 1,2,3,4,5,6....	     否 默认7
 * bc	backgroud_color     背景色&透明度 rgba 逗号分开	 	     否 默认白色 255255,255,0
 * fc	froreground_color   前景色&透明度 rgba 逗号分开	 	     否 默认黑色 0,0,0,0
 */
include_once('./QRcode.php');

// 接收参数
$content = $_GET['c'] ? $_GET['c'] : 'https://www.qian.blue';
$size = $_GET['s'] ? $_GET['s'] : 7;
$background = $_GET['bc']?explode(',',$_GET['bc']):array(255, 255, 255, 0);
$foreground = $_GET['fc']?explode(',',$_GET['fc']):array(0, 0, 0, 0);

// 图片输出
header("Content-type: image/jpg");
echo Toplib_Lib_QRcode::png($content,false,QR_ECLEVEL_L,$size,1,false,$background,$foreground);

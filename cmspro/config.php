<?php

// +----------------------------------------------------------------------
// | CMSPRO v1.0.0
// +----------------------------------------------------------------------
// | 版权所有 2018~2118 菏泽市牡丹区德品网络服务中心 [ http://www.depin.net ]
// +----------------------------------------------------------------------
// | 官方网站：http://www.cmspro.cn
// +----------------------------------------------------------------------
// | 作者: 任华立 <715287@qq.com>
// +----------------------------------------------------------------------
/*
 * 项目配置文件
 */

/* * *************数据库配置**************** */
/***主机地址*/
define('DB_HOST', "localhost");
/***数据库端口*/
define('DB_PORT', "3306");
/***数据帐户*/
define('DB_USER', "root");
/***数据密码*/
define('DB_PWD', "root");
/***数据库名*/
define('DB_NAME', "yuming_com");
/***表前缀*/
define('DB_PREFIX', "cp_");
/***数据库编码*/
define('DB_CHARSET', "utf8");

/* * *************网站安全设置**************** */
/***目录白名单*/
define('_ADMIN_', "admin"); //注意：真是目录路径，非伪静态
/***URL白名单*/
$_url_=array('index.php?' => _ADMIN_);//注意：动态路径，默认admin
define('_URL_', serialize($_url_)); 
//提交方式拦截(1开启拦截,0关闭拦截,post,get,cookie,referre选择需要拦截的方式)
define('_WEBSCAN_POST_', "1");
define('_WEBSCAN_GET_', "1");
define('_WEBSCAN_COOKIE_', "1");
define('_WEBSCAN_REFERRE_', "1");
<?php

// +----------------------------------------------------------------------
// | CMSPRO 精简版 v2018
// +----------------------------------------------------------------------
// | 版权所有 2016~2018 菏泽市牡丹区德品网络服务中心 [ http://www.depin.net ]
// +----------------------------------------------------------------------
// | 官方网站：http://www.cmspro.cn
// +----------------------------------------------------------------------
// | 作者: 任华立 <715287@qq.com>
// +----------------------------------------------------------------------

/**
 * 登陆状态检查
 */
if ($_SESSION['admin'] > 0 && cp::url()[2] != 'login') {
    
} elseif ($_SESSION['admin'] == null && cp::url()[2] != 'login') {
    header('Location:/' . cp::url()[1] . '/login');
    exit('还未登陆！');
}
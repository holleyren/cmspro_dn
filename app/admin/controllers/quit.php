<?php

// +----------------------------------------------------------------------
// | CMSPRO v2017
// +----------------------------------------------------------------------
// | 版权所有 2016~2018 菏泽市牡丹区德品网络服务中心 [ http://www.depin.net ]
// +----------------------------------------------------------------------
// | 官方网站：http://www.cmspro.cn
// +----------------------------------------------------------------------
// | 作者: 任华立 <715287@qq.com>
// +----------------------------------------------------------------------
/**
 * 退出登录
 */
unset($_SESSION['admin']);
header('Location:/'.$_cp->url()[1].'/login');
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
if ($dn['domain'] == null) {
    exit($_data['sys']['null']);
} elseif ($dn['url'] != null) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: '.$dn['url']);
}

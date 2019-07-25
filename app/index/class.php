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

/**
 * 获取顶级域名
 * @return [type] 
 * 比如reserve.applinzi.com返回applinzi.com
 */
function get_host($to_virify_url = '') {

    $url = $to_virify_url ? $to_virify_url : $_SERVER['HTTP_HOST'];
    $data = explode('.', $url);
    $co_ta = count($data);

    //判断是否是双后缀
    $zi_tow = true;
    $host_cn = 'com.cn,net.cn,org.cn,gov.cn';
    $host_cn = explode(',', $host_cn);
    foreach ($host_cn as $host) {
        if (strpos($url, $host)) {
            $zi_tow = false;
        }
    }

    //如果是返回FALSE ，如果不是返回true
    if ($zi_tow == true) {

        // 是否为当前域名
        if ($url == 'localhost') {
            $host = $data[$co_ta - 1];
        } else {
            $host = $data[$co_ta - 2] . '.' . $data[$co_ta - 1];
        }
    } else {
        $host = $data[$co_ta - 3] . '.' . $data[$co_ta - 2] . '.' . $data[$co_ta - 1];
    }

    return $host;
}

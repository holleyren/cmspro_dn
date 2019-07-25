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
 * Web安全过滤
 */
class http {

    var $method;
    var $post;
    var $header;
    var $ContentType;

    function __construct() {
        $this->method = '';
        $this->cookie = '';
        $this->post = '';
        $this->header = '';
        $this->errno = 0;
        $this->errstr = '';
    }

    function post($url, $data = array(), $referer = '', $limit = 0, $timeout = 30, $block = TRUE) {
        $this->method = 'POST';
        $this->ContentType = "Content-Type: application/x-www-form-urlencoded\r\n";
        if ($data) {
            $post = '';
            foreach ($data as $k => $v) {
                $post .= $k . '=' . rawurlencode($v) . '&';
            }
            $this->post .= substr($post, 0, -1);
        }
        return $this->request($url, $referer, $limit, $timeout, $block);
    }

    function request($url, $referer = '', $limit = 0, $timeout = 30, $block = TRUE) {
        $matches = parse_url($url);
        $host = $matches['host'];
        $path = $matches['path'] ? $matches['path'] . ($matches['query'] ? '?' . $matches['query'] : '') : '/';
        $port = $matches['port'] ? $matches['port'] : 80;
        if ($referer == '')
            $referer = URL;
        $out = "$this->method $path HTTP/1.1\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Referer: $referer\r\n";
        $out .= "Accept-Language: zh-cn\r\n";
        $out .= "User-Agent: " . $_SERVER['HTTP_USER_AGENT'] . "\r\n";
        $out .= "Host: $host\r\n";
        if ($this->method == 'POST') {
            $out .= $this->ContentType;
            $out .= "Content-Length: " . strlen($this->post) . "\r\n";
            $out .= "Cache-Control: no-cache\r\n";
            $out .= "Connection: Close\r\n\r\n";
            $out .= $this->post;
        } else {
            $out .= "Connection: Close\r\n\r\n";
        }
        if ($timeout > ini_get('max_execution_time'))
            @set_time_limit($timeout);
        $fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
        $this->post = '';
        if (!$fp) {
            return false;
        } else {
            stream_set_blocking($fp, $block);
            stream_set_timeout($fp, $timeout);
            fwrite($fp, $out);
            $this->data = '';
            $status = stream_get_meta_data($fp);
            if (!$status['timed_out']) {
                $maxsize = min($limit, 1024000);
                if ($maxsize == 0)
                    $maxsize = 1024000;
                $start = false;
                while (!feof($fp)) {
                    if ($start) {
                        $line = fread($fp, $maxsize);
                        if (strlen($this->data) > $maxsize)
                            break;
                        $this->data .= $line;
                    } else {
                        $line = fgets($fp);
                        $this->header .= $line;
                        if ($line == "\r\n" || $line == "\n")
                            $start = true;
                    }
                }
            }
            fclose($fp);
            return "200";
        }
    }

}

/**
 *   关闭用户错误提示
 */
function webscan_error() {
    if (ini_get('display_errors')) {
        ini_set('display_errors', '0');
    }
}

/**
 *  参数拆分
 */
function webscan_arr_foreach($arr) {
    static $str;
    static $keystr;
    if (!is_array($arr)) {
        return $arr;
    }
    foreach ($arr as $key => $val) {
        $keystr = $keystr . $key;
        if (is_array($val)) {

            webscan_arr_foreach($val);
        } else {

            $str[] = $val . $keystr;
        }
    }
    return implode($str);
}

/**
 *  防护提示页
 */
function webscan_pape() {
    $pape = <<<HTML
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<title>输入内容存在危险字符，安全起见，已被本站拦截</title>
<style>
body, h1, h2, p,dl,dd,dt{margin: 0;padding: 0;font: 12px/1.5 微软雅黑,tahoma,arial;}
body{background:#efefef;}
h1, h2, h3, h4, h5, h6 {font-size: 100%;cursor:default;}
ul, ol {list-style: none outside none;}
a {text-decoration: none;color:#447BC4}
a:hover {text-decoration: underline;}
.ip-attack{width:600px; margin:200px auto 0;}
.ip-attack dl{ background:#fff; padding:30px; border-radius:10px;border: 1px solid #CDCDCD;-webkit-box-shadow: 0 0 8px #CDCDCD;-moz-box-shadow: 0 0 8px #cdcdcd;box-shadow: 0 0 8px #CDCDCD;}
.ip-attack dt{text-align:center;}
.ip-attack dd{font-size:16px; color:#333; text-align:center;}
.tips{text-align:center; font-size:14px; line-height:50px; color:#999;}
</style>
</head>
<body>
<div class="ip-attack">
<dl>
<dt>您的请求存在危险字符，安全起见，已本本站拦截。</dt>
<dt><a href="javascript:history.go(-1)">返回上一页</a></dt>
</dl>
</div>
</body>
</html>
HTML;
    echo $pape;
}

/**
 *  攻击检查拦截
 */
function webscan_StopAttack($StrFiltKey, $StrFiltValue, $ArrFiltReq, $method) {
    $StrFiltValue = webscan_arr_foreach($StrFiltValue);
    if (preg_match("/" . $ArrFiltReq . "/is", $StrFiltValue) == 1) {
        webscan_slog(array('ip' => $_SERVER["REMOTE_ADDR"], 'time' => strftime("%Y-%m-%d %H:%M:%S"), 'page' => $_SERVER["PHP_SELF"], 'method' => $method, 'rkey' => $StrFiltKey, 'rdata' => $StrFiltValue, 'user_agent' => $_SERVER['HTTP_USER_AGENT'], 'request_url' => $_SERVER["REQUEST_URI"]));
        exit(webscan_pape());
    }
    if (preg_match("/" . $ArrFiltReq . "/is", $StrFiltKey) == 1) {
        webscan_slog(array('ip' => $_SERVER["REMOTE_ADDR"], 'time' => strftime("%Y-%m-%d %H:%M:%S"), 'page' => $_SERVER["PHP_SELF"], 'method' => $method, 'rkey' => $StrFiltKey, 'rdata' => $StrFiltKey, 'user_agent' => $_SERVER['HTTP_USER_AGENT'], 'request_url' => $_SERVER["REQUEST_URI"]));
        exit(webscan_pape());
    }
}

/**
 *  拦截目录白名单
 */
function webscan_white($webscan_white_name, $webscan_white_url = array()) {
    $url_path = $_SERVER['SCRIPT_NAME'];
    $url_var = $_SERVER['QUERY_STRING'];
    if (preg_match("/" . $webscan_white_name . "/is", $url_path) == 1 && !empty($webscan_white_name)) {
        return false;
    }
    foreach ($webscan_white_url as $key => $value) {
        if (!empty($url_var) && !empty($value)) {
            if (stristr($url_path, $key) && stristr($url_var, $value)) {
                return false;
            }
        } elseif (empty($url_var) && empty($value)) {
            if (stristr($url_path, $key)) {
                return false;
            }
        }
    }

    return true;
}

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

if (@$_GET['do'] == 'sys') {
    $sys = unserialize(file_get_contents(PATH . '/cmspro/data.cmspro'));
    if (is_dir(PATH . '/app/' . $_POST['adminurl'])) {
        
    } else {
        rename(PATH . '/app/' . $_cp->url()[1], PATH . '/app/' . $_POST['adminurl']);
        $go = 1;
    }
    $sys = array(
        'sys' => array(
            'adminurl' => $_POST['adminurl'],
            'admin' => $_POST['admin'],
            'null' => $_POST['null'],
            'count' => $_POST['count']
        )
    );
    //保存数据
    
    file_put_contents(PATH . '/cmspro/data.cmspro', serialize($sys));
    if($go==1){
        exit('修改成功！<script>setTimeout(function(){self.location.href="/'.$_POST['adminurl'].'/system"},1000);</script>');
    }else{
        exit('修改成功！<script>setTimeout(function(){window.location.reload();},1000);</script>');
    }
} else {
    //读取数据
    $data = unserialize(file_get_contents(PATH . '/cmspro/data.cmspro'));
    $sys = $data['sys'];
    
}
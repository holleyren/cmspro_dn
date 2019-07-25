<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" /> 
        <title><?= $dn['domain'] ?> - <?= $dn['name'] ?> - <?= $dn['title'] ?></title>
        <meta name="description" content="<?= $dn['description'] ?>" />
        <meta name="keywords" content="<?= $dn['keywords'] ?>" />
        <style type="text/css">
            * {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}*:before,*:after {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}html {font-size: 12px;font-family: sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}body {color: #333;background-color: #eee;font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;font-size: 14px;font-style: normal;font-weight: 400;line-height: 1.42857143;margin: 0px;padding: 0px;text-rendering: optimizeLegibility;-moz-font-feature-settings: "liga" on;-moz-osx-font-smoothing: grayscale;-webkit-font-smoothing: antialiased;}a {color: rgba(0,0,0,0.8);text-decoration: none;background-color: transparent;}a:active,a:hover {outline: 0;text-decoration: underline;cursor: pointer;}.l {float: left;}.c {clear: both;}.container {margin: 250px auto;width: 420px;}.select {height: 140px;background-color: #fafafa;border: 0;border-radius: 3px;box-shadow: 0 2px 5px 0 rgba(0,0,0,.26);display: inline-block;font-weight: 500;line-height: 16px;font-size: 16px;margin: 5px;padding: 32px 15px;text-align: center;}</style>
    </head>
    <body>
        <div class="container">
            <?php
            if($dn['logo']!=null){
               echo '<img src="'.$dn['logo'].'">'; 
            }
            ?>
            <div class="l select">
                <?= unserialize(base64_decode($dn['data'])) ?>
            </div>
        </div>
        <div style="display:none"><?= $_data['sys']['count'] ?></script></div>
    </body>
</html>
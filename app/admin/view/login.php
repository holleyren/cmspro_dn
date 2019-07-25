<!DOCTYPE html>
<html lang="zh-cn" class="app">
    <head>
        <meta charset="utf-8" />
        <title>管理登录 - 多域名管理系统 | Powered by CmsPro</title>
        <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="/public/min/libs/assets/animate.css/animate.css" type="text/css" />
        <link rel="stylesheet" href="/public/min/libs/assets/font-awesome/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="/public/min/libs/assets/simple-line-icons/css/simple-line-icons.css" type="text/css" />
        <link rel="stylesheet" href="/public/min/libs/jquery/bootstrap/dist/css/bootstrap.css" type="text/css" />

        <link rel="stylesheet" href="/public/min/css/font.css" type="text/css" />
        <link rel="stylesheet" href="/public/min/css/app.css" type="text/css" />
        <style>input:-webkit-autofill{-webkit-box-shadow:0 0 0px 1000px white inset;-webkit-text-fill-color:#333;}</style>
    </head>
    <body>

    </body><div class="app ng-scope app-header-fixed app-aside-fixed" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view="" style=""><div class="modal-over bg-black ng-scope">
            <div class="modal-center animated fadeInUp text-center" style="width:200px;margin:-100px 0 0 -100px;">
                <div class="thumb-lg">
                    <img src="/public/min/img/a3.jpg" class="img-circle">
                </div>
                <p class="h4 m-t m-b">您好管理员</p>
                <div class="input-group" onKeyDown = "_b()">
                    <input type="password" name="password" class="form-control text-sm btn-rounded no-border" placeholder="请输入解锁密码">
                    <span class="input-group-btn">
                        <a href="javascript:login()" class="btn btn-success btn-rounded no-border"><i class="fa fa-arrow-right"></i></a>
                    </span>
                </div>
            </div>
        </div></div>

    <script src="/public/static/user/js/jquery.min.js"></script>
    <script src="/public/static/user/js/bootstrap.js"></script>
    <script src="/public/min/layer/layer.js"></script>
    <script>
                    function login() {
                        var password = $("input[name='password']").val();
                        if (password === '') {
                            layer.alert('密码不能为空！');
                        } else {
                            $.post('?do=validation', {password: password}, function (text) {
                                layer.alert(text);
                            });
                        }
                    }
                    function _b() {
                        if (event.keyCode == 13) {
                            login();
                        }
                    }
    </script>
</body>
</html>

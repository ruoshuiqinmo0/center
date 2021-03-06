<?php
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>小科实验室教务管理系统</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/center/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/center/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/center/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/center/css/admin.css">
    <link rel="stylesheet" href="assets/center/css/app.css">
</head>

<body data-type="login">

<div class="am-g myapp-login">
    <div class="myapp-login-logo-block  tpl-login-max">
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                <span>计费系统</span> <i class="am-icon-skyatlas"></i>

            </div>
        </div>
        <div class="am-u-sm-10 login-am-center">
            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'am-form'
                ],
                'fieldConfig' => [
                    'template' => '<div class="am-form-group">{input}{error}</div>',
                ]
            ]); ?>
            <fieldset>
                <?php echo $form->field($model, 'account')->textInput(['id' => 'doc-ipt-email-1', 'placeholder' => '请输入账号']); ?>
                <?php echo $form->field($model, 'password')->passwordInput(['id' => 'doc-ipt-pwd-1', 'placeholder' => '请输入密码']); ?>
                <?php echo $form->field($model, 'verificationCode')->widget(Captcha::className(), [
                        'captchaAction' => 'login/captcha',
                        'template' => '{input}{image}',
                        'imageOptions' => [
                            'alt' => '点击刷新',
                            'title' => '点击刷新',
                            'style'=>'cursor:pointer;margin-top:20px;width:120px;',
                             'placeholder'=>'请输入验证码',
                        ],
                    ])?>
                <p><?=Html::submitButton('登录',['class'=>'am-btn am-btn-default','id'=>'backLoginSubmit']);?></p>
                </fieldset >
            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
<script src="assets/center/js/jquery.min.js"></script>
<script src="assets/center/js/amazeui.min.js"></script>
<script src="assets/center/js/app.js"></script>
<script>
    $("#developer-verificationcode-image").click(function(){
        $.get("<?php echo yii\helpers\Url::to(['login/captcha','refresh'=>''])?>",function(res){
           // var data = JSON.parse(res);
            $("#developer-verificationcode-image").attr('src', res.url);
        })
    });

    //    $("#backLoginSubmit").click(function(){
    //        var username = $.trim($("input[name='name']").val());
    //        var password = $.trim($("input[name='password']").val());
    //        if(username=='' || password ==''){
    //            alert('请输入完整后，提交');
    //            return false;
    //        }
    //        var hash  = $.trim($("input[name='__hash__']").val());
    //        $.post("{:U('Login/ajaxLogin')}", {"username":username, "password":password,"hash":hash}, function(d){
    //            if(d.status == 1){
    //                window.location.href = "{:U('Index/index')}";
    //            }else{
    //                alert(d.info);
    //                //$("#verify").click();
    //            }
    //        }, "json");
    //    });

</script>
</body>

</html>
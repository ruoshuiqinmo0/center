<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="tpl-content-wrapper">
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <ol class="am-breadcrumb">
                <li><a href="#" class="am-icon-home">首页</a></li>
                <li><a href="<?php echo yii\helpers\Url::To(['index']) ?>">产品管理</a></li>
                <li class="am-active">添加产品</li>
            </ol>
        </div>
        <div class="tpl-block ">
            <div class="am-g tpl-amazeui-form">
                <div class="am-u-sm-12 am-u-md-9">
                    <?php $form = ActiveForm::begin([
                        'method' => 'post',
                        'options' => [
                            'class' => 'am-form am-form-horizontal'
                        ],
                        'fieldConfig' => [
                            'template' => '<div class="am-form-group">{label}<div class="am-u-sm-9">{input}</div>{error}</div>',
                        ],
                    ]); ?>
                        <?php echo $form->field($model, 'product_no')->textInput(['class' => 'class_name', 'id' => 'product_no', 'readonly' => true])->label('产品编号', ['class' => 'am-u-sm-3 am-form-label']) ?>
                        <?php echo $form->field($model, 'name')->textInput(['class' => 'class_name','placeholder'=>'长度32位'])->label('产品名称', ['class' => 'am-u-sm-3 am-form-label']) ?>
                        <?php echo $form->field($model,'package')->textInput(['class' => 'class_name','placeholder'=>'包名长度在5~30之间'])->label('包名', ['class' => 'am-u-sm-3 am-form-label'])?>
                        <?php echo $form->field($model,'sign')->textInput(['class'=>'class_name','placeholder'=>'签名最长长度32位'])->label('签名',['class' => 'am-u-sm-3 am-form-label']);?>
                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <?php echo Html::submitButton('提交保存', ['class' => "am-btn am-btn-success"]);
                                  echo Html::resetButton('重置',['class'=>'am-btn am-btn-danger']);
                            ?>
                        </div >
                    </div >
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="./assets/center/js/jquery.min.js"></script>
<script src="./assets/center/js/amazeui.min.js"></script>
<script src="./assets/center/js/amazeui.datetimepicker.min.js"></script>
<script src="./assets/center/js/app.js"></script>
</body>

</html>
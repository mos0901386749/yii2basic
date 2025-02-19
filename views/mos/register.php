<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerCssFile('@web/css/mos.css', ['depends' => [\yii\web\YiiAsset::class]]);

$this->title = 'สมัครสมาชิก';
?>



<div class="site-register d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 350px;">
        <h3 class="text-center mb-4"><?= Html::encode($this->title) ?></h3>

        <?php $form = ActiveForm::begin(['id' => 'register-form']); ?>

        <?= $form->field($model, 'username')->textInput(['placeholder' => 'ชื่อผู้ใช้'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'รหัสผ่าน'])->label(false) ?>

        <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'ยืนยันรหัสผ่าน'])->label(false) ?>

        <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'อีเมล'])->label(false) ?>

        <div class="form-group text-center">
            <?= Html::submitButton('สมัครสมาชิก', ['class' => 'btn btn-success w-100']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
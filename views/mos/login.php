<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Login';
$this->registerCssFile('@web/css/mos.css', ['depends' => [\yii\web\YiiAsset::class]]);
?>

<?php
// แสดงข้อความสำเร็จ
if (Yii::$app->session->hasFlash('success')) {
    $success = Html::encode(Yii::$app->session->getFlash('success'));
    $this->registerJs("alert('$success');");
}
?>


<div class="site-login d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 350px;">
        <h3 class="text-center mb-4"><?= Html::encode($this->title) ?></h3>

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Username'])->label(false) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Password'])->label(false) ?>
        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group text-center">
            <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary w-100 mb-2']) ?>

            <?= Html::a('สมัครสมาชิก', ['mos/register'], ['class' => 'btn btn-secondary w-100']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
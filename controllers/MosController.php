<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\Product; // เรียกใช้ Model

class MosController extends Controller
{
    // กำหนดพฤติกรรมการเข้าถึง
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'], // อนุญาตเฉพาะผู้ที่ Login แล้ว
                    ],
                ],
                'denyCallback' => function () {
                    Yii::$app->session->setFlash('error', 'กรุณา Login ก่อนเข้าหน้าแรก!');
                    return Yii::$app->response->redirect(['mos/login']);
                }
            ],
        ];
    }

    // แสดงหน้า Index
    public function actionIndex()
{
    // ดึงข้อมูลโดยใช้ Active Record
    $products = Product::find()->all();
    
    // ส่งข้อมูลไปยัง view
    return $this->render('index', ['products' => $products]);
}


public function actionIndexId($id)
{
    $productId = Product::findOne($id);

    if (!$productId) {
        throw new \yii\web\NotFoundHttpException('ไม่พบสินค้านี้');
    }

    return $this->render('indexId', ['productId' => $productId]);
}




    // จัดการหน้า Login
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['mos/index']);
        }

        if (Yii::$app->session->hasFlash('error')) {
            $error = Yii::$app->session->getFlash('error');
            Yii::$app->view->registerJs("alert('$error');");
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    public function actionRegister()
{
    $model = new \app\models\RegisterForm();

    if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $user = new \app\models\User();
        $user->username = $model->username;
        $user->email = $model->email;
        $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password);
        if ($user->save()) {
            Yii::$app->session->setFlash('success', 'สมัครสมาชิกสำเร็จ! กรุณาเข้าสู่ระบบ');
            return $this->redirect(['mos/login']);
        } else {
            Yii::$app->session->setFlash('error', 'เกิดข้อผิดพลาด! กรุณาลองใหม่อีกครั้ง');
        }
    }

    return $this->render('register', ['model' => $model]);
}


}
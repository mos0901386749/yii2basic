<?php 

namespace app\controllers;

use yii\web\Controller;
use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex()
    {
        // ดึงสินค้าทั้งหมดจากฐานข้อมูล
        $products = Product::find()->all();
        return $this->render('index', ['products' => $products]);
    }

    public function actionDetail($id)
    {
        // ดึงสินค้าตาม ID
        $product = Product::findOne($id);
        if (!$product) {
            throw new \yii\web\NotFoundHttpException('ไม่พบสินค้า');
        }
        return $this->render('detail', ['product' => $product]);
    }
}


?>
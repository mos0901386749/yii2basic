<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'products';  // ชื่อตารางใน MySQL
    }
}


?>
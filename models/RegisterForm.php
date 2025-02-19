<?php

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $confirm_password;
    public $email;

    public function rules()
    {
        return [
            [['username', 'password', 'confirm_password', 'email'], 'required'], //บังคับให้กรอกข้อมูลตามที่ใส่
            ['email', 'email'], //ตรวจสอบรูปแบบ e-mail
            ['password', 'string', 'min' => 6], //รหัสต้องไม่น้อยกว่า 6 ตัว
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'รหัสผ่านไม่ตรงกัน'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'อีเมลนี้ถูกใช้ไปแล้ว'],
        ];
    }
}



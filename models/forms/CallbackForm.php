<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class CallbackForm extends Model
{

    public $name;
    public $phone;

    public function rules()
    {
        return [

            [['name'], 'required', 'message' => 'Пожалуйста, введите имя'],
            [['phone'], 'required', 'message' => 'Пожалуйста, введите телефон'],
            [['name'], 'string'],
            [['phone'], 'string'],
        ];
    }

    public function sendForm()
    {
        foreach(Yii::$app->params['callbackEmails'] as $email) {

            $textBody = 'Оставлена заявка на сайте. Имя: ' .$this->name. ' Телефон: ' . $this->phone;

            Yii::$app->mailer->compose()
                ->setFrom('nashastoma.promo@gmail.com')
                ->setTo($email)
                ->setSubject('Оставлена заявка на сайте')
                ->setTextBody($textBody)
                ->send();

        }
        $this->setNull();
    }
    public function setNull()
    {
        $this->name = null;
        $this->phone = null;
    }


}


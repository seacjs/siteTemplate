<?php

namespace app\models;

use app\behaviors\ImageContentBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "settings".
 *
 * @property int $id
 * @property int $phone
 * @property int $second_phone
 * @property string $email
 * @property string $address
 * @property string $address_short
 * @property string $vk
 * @property string $facebook
 * @property string $instagram
 * @property string $work_time
 * @property string $work_days
 * @property string $map
 * @property string $about
 */
class Settings extends FrontActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'imageContentBehavior' => [
                'class' => ImageContentBehavior::class,
                'contentAttribute' => 'about'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone', 'second_phone'], 'string'],
            [['about'], 'string'],
            [['email', 'address', 'address_short', 'vk', 'facebook', 'instagram', 'work_time', 'work_days', 'map'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'phone' => Yii::t('app', 'Phone'),
            'second_phone' => Yii::t('app', 'Second Phone'),
            'email' => Yii::t('app', 'Email'),
            'address' => Yii::t('app', 'Address'),
            'address_short' => Yii::t('app', 'Address Short'),
            'vk' => Yii::t('app', 'Vk'),
            'facebook' => Yii::t('app', 'Facebook'),
            'instagram' => Yii::t('app', 'Instagram'),
            'work_time' => Yii::t('app', 'Work Time'),
            'work_days' => Yii::t('app', 'Work Days'),
            'map' => Yii::t('app', 'Map'),
            'about' => Yii::t('app', 'About'),
        ];
    }



}

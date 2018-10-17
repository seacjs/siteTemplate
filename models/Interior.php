<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "interior".
 *
 * @property int $id
 */
class Interior extends FrontActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interior';
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        ArrayHelper::remove($behaviors,'timestampBehavior');
        ArrayHelper::remove($behaviors,'sluggableBehavior');
        ArrayHelper::remove($behaviors,'imageContentBehavior');
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }
}

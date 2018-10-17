<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "sales".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $date_at
 * @property string $value
 * @property string $date
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 *
 * @property Service $service
 */
class Sales extends FrontActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        ArrayHelper::remove($behaviors,'sluggableBehavior');
        ArrayHelper::remove($behaviors,'imageContentBehavior');
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_at', 'created_at', 'updated_at', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['name', 'description', 'date','value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'date_at' => Yii::t('app', 'Date At'),
            'date' => Yii::t('app', 'Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'status' => Yii::t('app', 'Status'),
            'value' => Yii::t('app', 'Value'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}

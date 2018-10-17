<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "price".
 *
 * @property int $id
 * @property int $category_id
 * @property int $service_id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string $description
 * @property string $info
 * @property string $price
 * @property int $display_variant
 * @property string $tags
 * @property string $categoryName
 * @property int $efficiency
 * @property int $speed
 * @property int $aesthetics
 * @property int $status
 *
 * @property PriceCategory $category
 * @property Service $service
 */
class Price extends FrontActiveRecord
{

    const DISPLAY_BASIC_VARIANT = 0;
    const DISPLAY_ADVANCED_VARIANT = 1;
    const DISPLAY_FULL_VARIANT = 2;

    public $categoryName = '';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price';
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
        return [
            [['category_id', 'service_id', 'created_at', 'updated_at', 'display_variant', 'efficiency', 'speed', 'aesthetics', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'required'],
            [['name', 'description', 'info', 'price', 'tags','categoryName'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => PriceCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::className(), 'targetAttribute' => ['service_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'categoryName' => Yii::t('app', 'Category name'),
            'category_id' => Yii::t('app', 'Category ID'),
            'service_id' => Yii::t('app', 'Service ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'info' => Yii::t('app', 'Info'),
            'price' => Yii::t('app', 'Price'),
            'display_variant' => Yii::t('app', 'Display Variant'),
            'tags' => Yii::t('app', 'Tags'),
            'efficiency' => Yii::t('app', 'Efficiency'),
            'speed' => Yii::t('app', 'Speed'),
            'aesthetics' => Yii::t('app', 'Aesthetics'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(PriceCategory::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id' => 'service_id']);
    }
}

<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property int $created_at
 * @property int $updated_at
 * @property string $content
 * @property string $short_content
 * @property string $jumbo_description
 * @property int $status
 */
class Service extends FrontActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at', 'status','parent_id'], 'integer'],
            [['content'], 'string'],
            [['jumbo_description'], 'string', 'max' => 512],
            [['name','slug','title', 'description', 'keywords', 'h1', 'short_content'], 'string', 'max' => 255],
            [['slug'],'safe']
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
            'slug' => Yii::t('app', 'Slug'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
            'h1' => Yii::t('app', 'H1'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'content' => Yii::t('app', 'Content'),
            'short_content' => Yii::t('app', 'Content Description'),
            'status' => Yii::t('app', 'Status'),
            'parent_id' => Yii::t('app', 'Parent ID'),
            'jumbo_description' => Yii::t('app','Jumbo Description')
        ];
    }

    public function getChildrenIds() {
        $ids = [];
        $children = self::find()->where([
            'parent_id' => $this->id,
        ])->all();
        foreach($children as $child) {
            $ids[] = $child->id;
            $ids = ArrayHelper::merge($ids,
                $child->getChildrenIds());
        }
        return $ids;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent() {
        return $this->hasMany(Service::class, ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrices() {
        return $this->hasMany(Price::class, ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors() {
        return $this->hasMany(Doctor::class, ['id' => 'doctor_id'])->viaTable('doctor_service', ['service_id' => 'id'])
            ->where([
                'doctor.status' => Doctor::STATUS_ACTIVE
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews() {
        return $this->hasMany(Review::class, ['id' => 'review_id'])->viaTable('service_review', ['service_id' => 'id'])
            ->where([
                'review.status' => Review::STATUS_ACTIVE
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamples() {
        return $this->hasMany(Example::class, ['id' => 'example_id'])->viaTable('example_service', ['service_id' => 'id'])
            ->where([
                'example.status' => Example::STATUS_ACTIVE
            ]);
    }
}

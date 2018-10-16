<?php

namespace app\models;

use Yii;

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
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['content'], 'string'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors() {
        return $this->hasMany(Doctor::class, ['id' => 'doctor_id'])->viaTable('doctor_service', ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews() {
        return $this->hasMany(Review::class, ['id' => 'review_id'])->viaTable('service_review', ['service_id' => 'id']);
    }
}

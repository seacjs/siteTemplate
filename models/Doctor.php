<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
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
 * @property string $position
 * @property string $specialization
 * @property string $scientist
 * @property int $status
 * @property int $main_on
 *
 * @property DoctorReview[] $doctorReviews
 * @property DoctorService[] $doctorServices
 */
class Doctor extends FrontActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at', 'status', 'main_on'], 'integer'],
            [['content', 'content2'], 'string'],
            [['name', 'slug', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['start_working'], 'integer'],
            [['position', 'specialization','scientist'],'string'],
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
            'content' => Yii::t('app', 'Образование'),
            'content2' => Yii::t('app', 'Повышение Квалификации'),
            'status' => Yii::t('app', 'Status'),

            'position' => Yii::t('app', 'Должность'), //  должность
            'specialization' => Yii::t('app', 'Специализация'), //  специализация
            'scientist' => Yii::t('app', 'Ученая степень'), //  ученая степерь
            'start_working' => Yii::t('app', 'Год начала работ'),
            'main_on' => 'Отображать на главной(ведущий специалист)',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices() {
        return $this->hasMany(Service::class, ['id' => 'service_id'])->viaTable('doctor_service', ['doctor_id' => 'id'])
            ->where([
                'service.status' => Service::STATUS_ACTIVE
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainServices() {
        return $this->hasMany(Service::class, ['id' => 'service_id'])->viaTable('doctor_service', ['doctor_id' => 'id'])
            ->where([
                'service.status' => Service::STATUS_ACTIVE
            ])
            ->andWhere([
                'service.parent_id' => null
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews() {
        return $this->hasMany(Review::class, ['id' => 'review_id'])->viaTable('doctor_review', ['doctor_id' => 'id'])
            ->where([
                'review.status' => Review::STATUS_ACTIVE
            ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamples() {
        return $this->hasMany(Example::class, ['id' => 'example_id'])->viaTable('example_doctor', ['doctor_id' => 'id'])
            ->where([
                'example.status' => Example::STATUS_ACTIVE
            ]);
    }
}

<?php

namespace app\models;

use app\behaviors\FileMethodsBehavior;
use app\behaviors\ImageContentBehavior;
use app\traits\DeleteFilesBeforeDeleteModelTrait;
use app\traits\GetFilesTrait;
use app\traits\GetFileTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "blog".
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
 * @property int $status
 */
class Blog extends \yii\db\ActiveRecord
{

    const STATUS_DRAFT = 0;
    const STATUS_ACTIVE = 1;

    /**
     * Get all statuses
     * @return array
     */
    public static function getStatusesArray() {
        return [
            self::STATUS_DRAFT => 'Черновик',
            self::STATUS_ACTIVE => 'Опубликовано',
        ];
    }

    const SCENARIO_CREATE = 'create';

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        return ArrayHelper::merge(parent::scenarios(),[
            self::SCENARIO_CREATE => [],
        ]);
    }

    /**
     * Use traits to get methods to work with files
     * todo: попробовать переделать на behaviors
     * */
    use GetFileTrait, GetFilesTrait, DeleteFilesBeforeDeleteModelTrait;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestampBehavior' => [
                'class' => TimestampBehavior::class,
            ],
            'imageContentBehavior' => [
                'class' => ImageContentBehavior::class
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['content'], 'string'],
            [['name', 'slug', 'title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
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
            'status' => Yii::t('app', 'Status'),
        ];
    }
}

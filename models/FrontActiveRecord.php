<?php

namespace app\models;


use app\traits\DeleteFilesBeforeDeleteModelTrait;
use app\traits\GetFilesTrait;
use app\traits\GetFileTrait;
use app\traits\GetImageTrait;
use app\traits\GetImagesTrait;

use app\behaviors\ImageContentBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;

use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

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
class FrontActiveRecord extends \yii\db\ActiveRecord
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
    use GetImageTrait,
        GetImagesTrait,
        GetFileTrait,
        GetFilesTrait,
        DeleteFilesBeforeDeleteModelTrait;

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
            ],
            'sluggableBehavior' => [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
                'preserveNonEmptyValues' => true,
            ],
        ]);
    }

    /**
     * Save links with current model
     */
    public function processLinks($className, $linkName, $ids = []) {

        $this->removeLinks($linkName);

        if(is_array($ids)) {
            foreach ($ids as $id) {
                $model = $className::findOne($id);
                $this->link($linkName, $model);
            }
        }

    }
    /**
     * Remove all links from current model
     */
    public function removeLinks($linkName) {
        foreach($this->$linkName as $model) {
            $this->unlink($linkName, $model, true);
        }
    }

//    TODO: afterDelete -> delete links and images

}

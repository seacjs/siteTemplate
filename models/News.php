<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property int $translation_on
 * @property int $main_title
 * @property int $main_img
 * @property int $main_video
 * @property int $main_preview
 * @property int $main_link
 * @property int $terminal_id
 * @property string $img
 * @property string $video
 * @property string $title_ru
 * @property string $title_en
 * @property string $preview_ru
 * @property string $preview_en
 * @property string $text_ru
 * @property string $text_en
 * @property string $button_name_ru
 * @property string $button_name_en
 * @property int $active
 */
class News extends ActiveRecord
{
    /* todo: add traits or behaviors from BaseActiveRecord */

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translation_on',], 'integer'],
            [['content'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('admin', 'ID'),
            'terminal_id' => Yii::t('admin', 'Terminal'),
        ];
    }


}

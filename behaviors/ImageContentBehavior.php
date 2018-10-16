<?php

namespace app\behaviors;

use app\models\File;
use keltstr\simplehtmldom\SimpleHTMLDom;
use yii;
use yii\base\Behavior;

/**
 * View ActiveModel after save and update attached files
 * @param $contentAttribute mixed
 */

class ImageContentBehavior extends Behavior
{

    const EVENT_BEFORE_CONTENT = 'beforeContent';

    public function beforeContent()
    {
        die('ImageContentBehavior');
    }
    /*
        TODO:: Переделать в contentBehavior который моб бы
            - выполнять текущие действия
            - todo:  работать с ссылками, т.е. брать ссылку на контент и связывать ее с материалом, как это было в pickfood(т.е. не было а хотелось что бы было, в общемм нужно еще обдумть.)

    */
    public $contentAttribute = 'content';

    public function events()
    {
        return [
            /* todo: заменить это событие на свое и сделать его только для редактирования EVENT_BEFORE_UPDATE */
            yii\db\BaseActiveRecord::EVENT_AFTER_FIND => 'afterFindContent', //'before',
            yii\db\ActiveRecord::EVENT_AFTER_UPDATE => 'updateContentAfterUpdate'
        ];
    }

    /**
     * For example add next code "$model->trigger('beforeContent');" when it need;
     * 
     * */
    public function afterFindContent()
    {
        $this->owner->on( 'beforeContent', function ($event) {
            $this->updateContentBeforeLoad();
        });
    }

    /**
     * Находит в контенте файлы и подставляет им alt и title
     *
     * */
    public function updateContentBeforeLoad()
    {
        $attributes = is_array($this->contentAttribute) ? $this->contentAttribute : array($this->contentAttribute);
        foreach($attributes as $attribute) {
            $content = SimpleHTMLDom::str_get_html($this->owner->{$attribute});
            if($content !== false) {
                $images = $content ? $content->find('img') : [];
                foreach ($images as $image) {
                    $elements = explode('/', $image->src);
                    $fileNameArray = explode('.', $elements[count($elements) - 1]);
                    $fileName = $fileNameArray[0];
                    $file = File::find()->where([
                        'name' => $fileName
                    ])->one();
                    if ($file !== null) {
                        $image->alt = $file->alt;
                        $image->title = $file->title;
                    }
                }
                $this->owner->{$attribute} = $content->save();
                $this->owner->save();
//                yii\helpers\VarDumper::dump($this->owner,10,1); die;
            }
        }
    }

    /**
     * Ищет файлы в контенте, проставляет им title и alt, и удаляет файлы удаленные из контента
     *
     */
    public function updateContentAfterUpdate()
    {

        $attributes = is_array($this->contentAttribute) ? $this->contentAttribute : array($this->contentAttribute);

        foreach($attributes as $attribute) {

            $content = SimpleHTMLDom::str_get_html($this->owner->{$attribute});
            $images = $content ? $content->find('img') : [];
            $imagesNames = [];

            foreach($images as $image) {
                $elements = explode('/',$image->src);
                $fileNameArray = explode('.',$elements[count($elements)-1]);
                $fileName = $fileNameArray[0];
                $file = File::find()->where([
                    'name' => $fileName
                ])->one();
                if($file !== null) {
                    $file->alt = $image->alt === false ? '' : $image->alt;
                    $file->title = $image->title === false ? '' : $image->title;
                    $file->save();
                } else {
                    // todo: ЕСЛИ(проверить) файл на другом сервере, тогда его нужно загрузить через ссылку...
                }
                $imagesNames[] = $fileName;

            }

            /* Удаляем файлы которые были удалены из контента */
            foreach($this->owner->contentFiles as $file) {
                if(array_search($file->name, $imagesNames) === false) {
                    $file->remove();
                }
            }


        }

    }

}
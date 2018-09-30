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
            yii\db\BaseActiveRecord::EVENT_AFTER_FIND => 'before',
            yii\db\ActiveRecord::EVENT_AFTER_UPDATE => 'update'
        ];
    }

    public function before()
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
            }
        }
    }
    public function update()
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
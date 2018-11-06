<?php

namespace app\behaviors;

use app\models\File;
use keltstr\simplehtmldom\SimpleHTMLDom;
use yii;
use yii\base\Behavior;

// TODO: this behavior
class ContentBehavior extends Behavior
{

    const EVENT_BEFORE_CONTENT = 'beforeContent';



    public $contentAttribute = 'content';

    public function events()
    {
        return [
            yii\db\BaseActiveRecord::EVENT_AFTER_FIND => 'afterFindContent', //'before',
            yii\db\ActiveRecord::EVENT_AFTER_UPDATE => 'updateContentAfterUpdate'
        ];
    }

    public function afterFindContent()
    {
        $this->owner->on( 'beforeContent', function ($event) {
            $this->updateContentBeforeLoad();
        });
    }

    /*
     * add event in findModel()
     * */
    public function beforeContent()
    {

        $matches = preg_match_all("|[{][{]+(.*)[}][}]+|U",
            "<b>пример: {{test}}</b><div align=left>это тест{{test2}}</div>",
            $out, PREG_PATTERN_ORDER);
        \yii\helpers\VarDumper::dump($out,10,1);die;
    }

}
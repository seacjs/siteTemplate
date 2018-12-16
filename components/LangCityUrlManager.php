<?php

namespace app\components;

use app\models\City;
use app\models\Lang;
use Yii;
use yii\helpers\VarDumper;
use yii\web\UrlManager;

Class LangCityUrlManager extends UrlManager
{
    public function createUrl($params)
    {

        $url = parent::createUrl($params);

        if($this->_isModule()) {
            return $url;
        }

        if(isset($params['language'])) {
            $lang = $params['language'];
            unset($params['language']);
        } else {
            $lang = Yii::$app->language;
        }

        if(isset($params['city'])) {
            $city = $params['city'];
            unset($params['city']);
        } else {
            $city = Yii::$app->params['city'];
        }

        $url = parent::createUrl($params);

        if( $url == '/' ) {
            return '/'.$lang.'/'.$city;
        } else {
            return '/'.$lang.'/'.$city.$url;
        }

    }

    protected function _isModule() {
        foreach(Yii::$app->modules as $key => $module) {
            $moduleId = Yii::$app->controller->module->id;
            if($moduleId == $key) return true;
        }
        return false;
    }

}
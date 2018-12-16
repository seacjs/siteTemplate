<?php

namespace app\components;

use Yii;
use yii\helpers\VarDumper;
use yii\web\UrlManager;

Class CityUrlManager extends UrlManager
{
    public $ruleConfig = [
        'class' => 'app\components\UrlRule'
    ];

    public function createUrl($params)
    {
        $url = parent::createUrl($params);

        if($this->_isModule()) {
            return $url;
        }

        if(isset($params[0]) && $this->_isMultiCity($params[0])) {
            return $url;
        }

        if(isset($params['city'])) {
            $city = $params['city'];
            unset($params['city']);
        } else {
            $city = Yii::$app->params['city'];
        }

        $url = parent::createUrl($params);

        return $url == '/' ? '/'.$city : '/'.$city.$url;

    }

    protected function _isMultiCity($route) {
        foreach(Yii::$app->urlManager->rules as $rule) {
            if($rule->route == $route) {
                return $rule->multiCity;
            }
        }
        return false;
    }

    protected function _isModule() {
        foreach(Yii::$app->modules as $key => $module) {
            $moduleId = Yii::$app->controller->module->id;
            if($moduleId == $key) return true;
        }
        return false;
    }

}
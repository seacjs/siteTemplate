<?php

namespace app\components;
use app\models\City;
use Yii;
use yii\helpers\VarDumper;
use yii\web\Request;

Class LangCityRequest extends Request
{

    private $_langUrl;

    public function getLangCityUrl()
    {
        if ($this->_langUrl === null) {
            $this->_langUrl = $this->getUrl();

            $url_list = explode('/', $this->_langUrl);

            if($this->_isModule()) {
                return $this->_langUrl;
            }

            $lang_url = isset($url_list[1]) ? $url_list[1] : null;
            $city_url = isset($url_list[2]) ? $url_list[2] : null;

            if($lang_url == '') {
                Yii::$app->language = 'ru';
            } else {
                Yii::$app->language = $lang_url;
            }

            if($city_url == '') {
                Yii::$app->params['city'] = Yii::$app->params['city'];
            } else {
                Yii::$app->params['city'] = $city_url;
            }

            if( $lang_url !== null && $lang_url === Yii::$app->language &&
                strpos($this->_langUrl, Yii::$app->language) === 1 )
            {
                $this->_langUrl = substr($this->_langUrl, strlen(Yii::$app->language)+1);
                $this->_langUrl = substr($this->_langUrl, strlen(Yii::$app->params['city'])+1);
            }
        }

        return $this->_langUrl;
    }

    protected function _isModule() {

        $string = $this->_langUrl;
        if(strpos($this->_langUrl, '?')) {
            $string = strstr($this->_langUrl, '?', true);
        }
        $partUrl = explode('/',$string)[1];

        foreach(Yii::$app->modules as $key => $module) {
            if($partUrl == $key) return true;
        }
        return false;
    }

    protected function resolvePathInfo()
    {
        $pathInfo = $this->getLangCityUrl();

        if (($pos = strpos($pathInfo, '?')) !== false) {
            $pathInfo = substr($pathInfo, 0, $pos);
        }

        $pathInfo = urldecode($pathInfo);

        // try to encode in UTF8 if not so
        // http://w3.org/International/questions/qa-forms-utf-8.html
        if (!preg_match('%^(?:
            [\x09\x0A\x0D\x20-\x7E]              # ASCII
            | [\xC2-\xDF][\x80-\xBF]             # non-overlong 2-byte
            | \xE0[\xA0-\xBF][\x80-\xBF]         # excluding overlongs
            | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2}  # straight 3-byte
            | \xED[\x80-\x9F][\x80-\xBF]         # excluding surrogates
            | \xF0[\x90-\xBF][\x80-\xBF]{2}      # planes 1-3
            | [\xF1-\xF3][\x80-\xBF]{3}          # planes 4-15
            | \xF4[\x80-\x8F][\x80-\xBF]{2}      # plane 16
            )*$%xs', $pathInfo)
        ) {
            $pathInfo = utf8_encode($pathInfo);
        }

        $scriptUrl = $this->getScriptUrl();
        $baseUrl = $this->getBaseUrl();
        if (strpos($pathInfo, $scriptUrl) === 0) {
            $pathInfo = substr($pathInfo, strlen($scriptUrl));
        } elseif ($baseUrl === '' || strpos($pathInfo, $baseUrl) === 0) {
            $pathInfo = substr($pathInfo, strlen($baseUrl));
        } elseif (isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], $scriptUrl) === 0) {
            $pathInfo = substr($_SERVER['PHP_SELF'], strlen($scriptUrl));
        } else {
            throw new InvalidConfigException('Unable to determine the path info of the current request.');
        }

        if (isset($pathInfo[0]) && $pathInfo[0] === '/') {
            $pathInfo = substr($pathInfo, 1);
        }

        return (string) $pathInfo;
    }

}
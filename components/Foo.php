<?php

namespace app\components;

use yii\base\Component;
use yii\base\Event;

class ImageEvent extends Component
{
    const EVENT_HELLO = 'hello';

    public function bar()
    {
        $this->trigger(self::EVENT_HELLO);
    }
}
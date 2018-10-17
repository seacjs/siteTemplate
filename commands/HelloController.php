<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Doctor;
use yii\console\Controller;
use yii\console\ExitCode;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {

        echo 'start hello';


        $this->settings();
        $this->data();


        echo ' ... end ';



        return ExitCode::OK;
    }
    public function settings()
    {
        $settings = new \app\models\Settings();
        $settings->phone = '+7 (812) 313-98-98';
        $settings->second_phone = '+7 (921) 994-02-82';
        $settings->address = 'СПб, м. Пр. Большевиков, ул. Латышских Стрелков, д. 1, лит. А, пом. 18-Н';
        $settings->address_short  = 'Санкт-Петербург, ул. Латышских Стрелков, д. 1, метро Пр. Большевиков';
        $settings->vk = 'vk.com/nashastoma/';
        $settings->facebook = 'facebook.com/nashastoma/';
        $settings->instagram = 'instagram.com/nashastoma/';
        $settings->email = 'info@nasha-stoma.ru';
        $settings->map = 'https://yandex.ru/map-widget/v1/?um=constructor%3A7d4766c15e06e2148dcfbbd5e2c5efa96051a60a76a06a2c684218c73bd2a7c7&amp;source=constructor';
        $settings->about = '...';
        $settings->save();

        $interior = new \app\models\Interior();
        $interior->save();

        $serificate = new \app\models\Sertificate();
        $serificate->save();

    }
    public function data()
    {
        $doc = new \app\models\Doctor();
        $doc->name = 'doc1';
        $doc->slug = 'doc1';
        $doc->main_on = 1;
        $doc->status = \app\models\Doctor::STATUS_ACTIVE;
        $doc->save();

        $doc2 = new \app\models\Doctor();
        $doc2->name = 'doc2';
        $doc2->slug = 'doc2';
        $doc2->main_on = 1;
        $doc2->status = \app\models\Doctor::STATUS_ACTIVE;
        $doc2->save();

        $ser = new \app\models\Service();
        $ser->name = 'ser1';
        $ser->slug = 'ser1';
        $ser->status = \app\models\Doctor::STATUS_ACTIVE;
        $ser->save();

        $ser2 = new \app\models\Service();
        $ser2->name = 'ser2';
        $ser2->slug = 'ser2';
        $ser2->status = \app\models\Doctor::STATUS_ACTIVE;
        $ser2->save();

        $ser3 = new \app\models\Service();
        $ser3->name = 'ser3';
        $ser3->slug = 'ser3';
        $ser3->status = \app\models\Doctor::STATUS_ACTIVE;
        $ser3->save();

        $rew = new \app\models\Review();
        $rew->name = 'rew';
        $rew->slug = 'rew';
        $rew->status = \app\models\Doctor::STATUS_ACTIVE;
        $rew->save();

        $rew2 = new \app\models\Review();
        $rew2->name = 'rew2';
        $rew2->slug = 'rew2';
        $rew2->status = \app\models\Doctor::STATUS_ACTIVE;
        $rew2->save();

        $exa = new \app\models\Example();
        $exa->name = 'ex';
        $exa->slug = 'ex';
        $exa->status = \app\models\Doctor::STATUS_ACTIVE;
        $exa->save();

        $exa2 = new \app\models\Example();
        $exa2->name = 'exa2';
        $exa2->slug = 'exa2';
        $exa2->status = \app\models\Doctor::STATUS_ACTIVE;
        $exa2->save();

    }

    public function dataPrice() {
        $catPrice = new \app\models\PriceCategory();
        $catPrice->name = 'someCategory';
        $catPrice->save();

        $catPrice2 = new \app\models\PriceCategory();
        $catPrice2->name = 'someCategory';
        $catPrice2->save();
    }
}

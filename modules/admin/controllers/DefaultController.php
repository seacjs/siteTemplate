<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\models\DynamicDiscount;
use app\models\File;
use app\models\Invoices;
use app\models\Product;
use app\models\Spendings;
use app\models\Subcategory;
use app\models\User;
use Yii;
use yii\helpers\VarDumper;
use yii\imagine\Image;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends FrontController
{

    /**
     * This action need to find user who have parent.phone == user.phone
     * */
    public function actionEmailtest() {
        $users = User::find()->with('parent')->all();
        $errors = [];
        foreach($users as $user) {
            $money = 0;

            if($user->phone == $user->parent->phone) {
                VarDumper::dump($user->id .'',10,1);
//                $user->parent_id = null;
//                $user->save();

//                $invoises = Invoices::find()->where([
//                    'parent_id' => $user->id
//                ])->all();
//                foreach($invoises as $invoice) {
//                    $money += $invoice['parent_value'];
//                }
//                echo ' --- ';
//                VarDumper::dump($user->money.'',10,1);
//                VarDumper::dump($money.'',10,1);
//                echo '<br>';
//                echo '<br>';

                $errors[] = $user;
            }

        }
        VarDumper::dump(count($errors),10,1);

        die;
    }
    public function actionImport()
    {
        die;
        $connection = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=vadojh_inv',
            'username' => 'vadojh_inv',
            'password' => '11111111',
        ]);
        $connection->open();

        $command = $connection->createCommand('SELECT * FROM invoices');
        $invoices = $command->queryAll();

        $command = $connection->createCommand('SELECT * FROM spendings');
        $spendings = $command->queryAll();

        $connection->close();

        foreach($invoices as $invoice) {
            $newInvoice = new Invoices();
//            $newInvoice->transaction_id = $invoice['transaction_id'];
            $newInvoice->period = $invoice['period'];
            $newInvoice->user_id = $invoice['user_id'];
            $newInvoice->terminal_id = $invoice['terminal_id'];
            $newInvoice->sum = $invoice['sum'];
            $newInvoice->parent_id = $invoice['parent_id'];
            $newInvoice->parent_interest = $invoice['parent_interest'];
            $newInvoice->parent_value = $invoice['parent_value'];
            $newInvoice->own_interest = $invoice['own_interest'];
            $newInvoice->own_value = $invoice['own_value'];
            $newInvoice->invoice_number = $invoice['invoice_number'];
            $newInvoice->remote_address = $invoice['remote_address'];
            $newInvoice->save();

            $user = User::find()->where([
                'id' => $invoice['user_id']
            ])->one();
            $user->money = $user->money + $invoice['own_value'];
            $user->save();

            $parent = User::find()->where(['id' => $invoice['parent_id']])->one();
            if($parent != null) {
                $parent->money = $parent->money + $invoice['parent_value'];
                $parent->save();
            }

        }

        foreach($spendings as $spending) {
            $newSpending = new Spendings();
            //$newSpending->spending_id = $spending['spending_id'];
            $newSpending->period = $spending['period'];
            $newSpending->user_id = $spending['user_id'];
            $newSpending->terminal_id = $spending['terminal_id'];
            $newSpending->sum = $spending['sum'];
            $newSpending->invoice_number = $spending['invoice_number'];
            $newSpending->remote_address = $spending['remote_address'];
            $newSpending->save();

            $user = User::find()->where([
                'id' => $spending['user_id']
            ])->one();

            $user->money = $user->money - $spending['sum'];
            $user->save();

        }

        echo 'Done'; die;
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {


        return $this->render('index');
    }


    /**
     * Login action. todo: this
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new \app\modules\admin\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays Error page.
     *
     * @return string
     */
    public function actionError()
    {

        return $this->render('error');
    }

    /**
     * Displays Error page.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }


}

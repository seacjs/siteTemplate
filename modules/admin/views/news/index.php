<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\admin\models\Admin;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?if(\app\modules\admin\models\Admin::canCreateTerminalItem()):?>

            <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>

        <?else:?>

            <?= \yii\bootstrap\Alert::widget([
                'body' => Yii::t('admin', 'Add one more terminal'),
                'options' => [
                    'class' => 'alert alert-danger'
                ]
            ]) ?>

        <?endif?>

    </p>

    <?= \himiklab\sortablegrid\SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'translation_on',
//            'main_title',
//            'main_img',
//            'main_video',

            //'main_preview',
            //'main_link',
            //'img',
            //'video',
            'title_ru',

            [
                'visible' => Yii::$app->user->can('superAdmin'),
                'attribute' => 'terminal_id',

                'label' => Yii::t('admin', 'Terminal'),
                'filter' => \app\modules\admin\models\Admin::terminalsArrayWithCity(),
                'filterInputOptions' => [
                    'prompt' => Yii::t('admin', 'All Terminals'),
                    'class' => 'form-control',
                    'id' => null
                ],
                'value' => function (\app\models\News $news) {
                    return $news->terminal->name;
                },

            ],



            //'title_en',
            //'preview_ru:ntext',
            //'preview_en:ntext',
            //'text_ru:ntext',
            //'text_en:ntext',
            [
                'label' => 'active',
                'attribute' => 'active',
                'class' => 'yii\grid\DataColumn',
                'content' => function ($data) {
                    return '<span class="label label-'.($data->active ? 'success' : 'danger').'">' .($data->active ? Yii::t('admin','active') :Yii::t('admin',' not active') ). '</span>';
                },
                'filterInputOptions' => [
                    'prompt' => Yii::t('admin', 'All types'),
                    'class' => 'form-control',
                ],
                'format' => 'boolean',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

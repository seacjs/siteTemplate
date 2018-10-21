<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\ServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', Yii::$app->controller->id);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?=Yii::$app->controller->id?>-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    <?= Html::a(Yii::t('app', 'Create ' . Yii::$app->controller->id), ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    <!-- \himiklab\sortablegrid\SortableGridView -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
//            'slug',
//            [
//                'attribute' => 'created_at',
//                'value' => function ($model, $index, $widget) {
//                    return Yii::$app->formatter->asDate($model->created_at);
//                },
//                'filter' => \dosamigos\datepicker\DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute' => 'created_at',
//                    'language' => 'en',
//                    'clientOptions' => [
//                        'autoclose' => true,
//                        'format' => 'yyyy-mm-dd',
//                    ],
//                ]),
//                'format' => 'html',
//            ],
//            [
//                'attribute' => 'updated_at',
//                'value' => function ($model, $index, $widget) {
//                    return Yii::$app->formatter->asDate($model->updated_at);
//                },
//                'filter' => \dosamigos\datepicker\DatePicker::widget([
//                    'model' => $searchModel,
//                    'attribute'=>'updated_at',
//                    'language' => 'ru',
//                    'clientOptions' => [
//                        'autoclose' => true,
//                        'format' => 'dd-M-yyyy'
//                    ]
//                ]),
//                'format' => 'html',
//            ],
            [
                'label' => 'status',
                'attribute' => 'status',
                'class' => 'yii\grid\DataColumn',
                'content' => function ($data) {
                    return '<span class="label label-'.($data->status ? 'success' : 'danger').'">' .($data->status ? Yii::t('app','Опубликован') :Yii::t('app','Черновик') ). '</span>';
                },
                'filterInputOptions' => [
                    'prompt' => Yii::t('app', 'All types'),
                    'class' => 'form-control',
                ],
                'format' => 'boolean',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>

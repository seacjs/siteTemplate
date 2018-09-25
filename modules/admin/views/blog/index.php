<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\admin\models\Admin;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blog');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>


    <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>



    </p>

    <!-- \himiklab\sortablegrid\SortableGridView -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',


            [
                'label' => 'status',
                'attribute' => 'status',
                'class' => 'yii\grid\DataColumn',
                'content' => function ($data) {
                    return '<span class="label label-'.($data->status ? 'success' : 'danger').'">' .($data->status ? Yii::t('app','active') :Yii::t('app',' not active') ). '</span>';
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

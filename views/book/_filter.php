<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
?>

<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'name:ntext',
        'date',
        'articul:ntext',
        'autor:ntext',

        ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout'=>"\n{items}\n{pager}\n{summary}",
]); ?>

<?php Pjax::end(); ?>

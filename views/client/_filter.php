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

        'fio',
        [
            'attribute' => 'book_id',
            'label' => 'Книги',
            'format' => 'raw',
            'value' => function ($model) {
                $list = '<ul>';
                foreach($model->issues as $k => $v){
                    $list .= '<li>'.$v->book->name.' - '.($v->date3 ? $v->date3 : "На руках").'</li>';
                }
                $list .= '</ul>';
                return $list;
            }
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
    'layout'=>"\n{items}\n{pager}\n{summary}",
]); ?>

<?php Pjax::end(); ?>

<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\models\Book;
use app\models\Employee;
use app\models\Client;
/* @var $this yii\web\View */
/* @var $searchModel app\models\IssueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Issues');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="issue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Issue'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'date1',
            'date2',
            [
            'attribute' => 'book_id',
                'value' => 'book.name',
                'filter' => Html::activeDropDownList($searchModel, 'book_id',
                    ArrayHelper::map(Book::find()->all(), 'id', 'name'),
                    ['class'=>'form-control', 'prompt' => '']),
            ],
            [
            'attribute' => 'client_id',
                'value' => 'client.fio',
                'filter' => Html::activeDropDownList($searchModel, 'client_id',
                    ArrayHelper::map(Client::find()->all(), 'id', 'fio'),
                    ['class'=>'form-control', 'prompt' => '']),
            ],
            [
            'attribute' => 'employee_id',
                'value' => 'employee.fio',
                'filter' => Html::activeDropDownList($searchModel, 'employee_id',
                    ArrayHelper::map(Employee::find()->all(), 'id', 'fio'),
                    ['class'=>'form-control', 'prompt' => '']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>

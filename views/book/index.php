<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-md-9" id="books">
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
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
              <div class="panel-heading">Фильтры</div>
              <div class="panel-body">
                <form id="fillterBooks" action="<?= Url::to(['book/filters'])?>">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Введите название">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status">
                          <option value="0">Выберите</option>
                          <option value="1">В наличии</option>
                          <option value="2">На руках</option>
                        </select>
                    </div>
                </form>
              </div>
            </div>
        </div>
    </div>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => date('d-M-Y'),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'dd-M-yyyy'
                        ]
                    ])->textInput(['value' => (!empty($model->date) ? $model->date : date('d-M-Y'))]) ?>

    <?= $form->field($model, 'articul')->textInput() ?>

    <?= $form->field($model, 'autor')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        $model::STATUS_ACTIVE => 'На руках',
        $model::STATUS_INACTIVE => 'В наличии'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

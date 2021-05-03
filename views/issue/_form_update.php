<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Issue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="issue-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date3')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => date('Y-m-d'),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->textInput(['value' => (!empty($model->date3) ? $model->date3 : date('Y-m-d'))])->label('Дата возврата') ?>

    <?= $form->field($model, 'condition')->textInput() ?>

    <?= $form->field($model, 'book_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date1')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date2')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'client_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'return_id')->hiddenInput(['value' => $model->id])->label(false) ?>

    <?= $form->field($model, 'employee_id')->dropDownList(
        $model->employees,
        [
            'prompt' => 'Выберите сотрудника'
        ],
    ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

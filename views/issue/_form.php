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

    <?= $form->field($model, 'date1')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => date('Y-m-d'),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->textInput(['value' => (!empty($model->date1) ? $model->date1 : date('Y-m-d'))]) ?>

    <?= $form->field($model, 'date2')->widget(DatePicker::classname(), [
                        'type' => DatePicker::TYPE_INPUT,
                        'value' => date('Y-m-d'),
                        'pluginOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])->textInput(['value' => (!empty($model->date2) ? $model->date2 : date('Y-m-d'))]) ?>

    <?= $form->field($model, 'book_id')->dropDownList(
        $model->books,
        [
            'prompt' => 'Выберите книгу'
        ],
    ) ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        $model->clients,
        [
            'prompt' => 'Выберите клиента'
        ],
    ) ?>

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

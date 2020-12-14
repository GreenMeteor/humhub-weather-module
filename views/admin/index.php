<?php

use humhub\modules\ui\form\widgets\SortOrderField;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<div class="panel panel-default">

    <div class="panel-heading"><?= \Yii::t('WeatherModule.base', '<strong>Weather</strong> module configuration') ?></div>

    <div class="panel-body">

        <?php $form = ActiveForm::begin(['id' => 'configure-form']); ?>
        <div class="form-group">
            <?= $form->field($model, 'serverUrl'); ?>
            <?= $form->field($model, 'location'); ?>
            <?= $form->field($model, 'sortOrder')->widget(SortOrderField::class) ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton(\Yii::t('WeatherModule.base', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => '']); ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

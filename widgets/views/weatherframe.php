<?php

use humhub\libs\Html;
use humhub\widgets\PanelMenu;
use humhub\modules\ui\view\components\View;

/* @var $weatherUrl string */
/* @var $location string */
/* @var $this View */

$urlJs = 'https://weatherwidget.io/js/widget.min.js';
?>

<div class="panel panel-default panel-weather" id="panel-weather">

    <style>
        #panel-weather .weatherwidget-io-frame {
            border-radius: 4px;
        }
    </style>

    <?= PanelMenu::widget(['id' => 'panel-weather']); ?>

    <div class="panel-heading">
        <i class="fa fa-cloud">&nbsp;</i><?= Yii::t('WeatherModule.base', '<strong>Weather</strong>') ?>
    </div>

    <div class="panel-body">
        <?= Html::beginTag('div') ?>

        <?= Html::a(Yii::t('WeatherModule.base', '{location} WEATHER', ['location' => $location]), $weatherUrl, [
            'class' => 'weatherwidget-io',
            'data-label_1' => $location,
            'data-label_2' => "WEATHER",
            'data-theme' => "original"
        ])?>

        <?= Html::beginTag('script', ['id' => 'weatherwidget-io-js', 'src' => $urlJs]) ?><?= Html::endTag('script') ?>
        <script <?= Html::nonce() ?>>
            $(document).off('humhub:ready.gm_weather').on('humhub:ready.gm_weather', function(event ,pjax) {
                if(pjax && window.__weatherwidget_init && $('#weatherwidget-io-js').length) {
                   __weatherwidget_init();
                }
            });
        </script>

        <?= Html::endTag('div') ?>
    </div>
</div>

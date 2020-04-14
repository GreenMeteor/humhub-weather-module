<?php

use humhub\modules\ui\view\components\View;
use humhub\libs\Html;
use humhub\widgets\PanelMenu;
use gm\modules\weather\Assets;

Assets::register($this);

/* @var $weatherUrl string */
/* @var $location string */
/* @var $this View */

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

        <?= Html::beginTag('script', ['id' => 'weatherwidget-io-js', 'src' => 'https://weatherwidget.io/js/widget.min.js']) ?><?= Html::endTag('script')?>
        <script <?= Html::nonce() ?>>
            $(document).off('humhub:ready.gm_weather').on('humhub:ready.gm_weather', function() {
                if($('#weatherwidget-io-js').length) {
                    __weatherwidget_init();
                }
            });
        </script>

        <?= Html::endTag('div') ?>
    </div>
</div>
<?php

namespace gm\modules\weather;

use Yii;
use yii\helpers\Url;
use yii\base\BaseObject;
use humhub\models\Setting;

class Events extends BaseObject
{

    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => Yii::t('WeatherModule.base', 'Weather Settings'),
            'url' => Url::toRoute('/weather/admin/index'),
            'group' => 'settings',
            'icon' => '<i class="fa fa-cloud"></i>',
            'isActive' => Yii::$app->controller->module && Yii::$app->controller->module->id == 'weather' && Yii::$app->controller->id == 'admin',
            'sortOrder' => 650
        ]);
    }

    public static function addWeatherFrame($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->addWidget(widgets\WeatherFrame::class, [], [
            'sortOrder' => Setting::Get('timeout', 'weather')
        ]);
    }
}

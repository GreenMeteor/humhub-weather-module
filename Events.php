<?php

namespace gm\modules\weather;

use Yii;
use yii\helpers\Url;
use yii\base\BaseObject;
use humhub\modules\ui\menu\MenuLink;
use humhub\modules\ui\icon\widgets\Icon;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\admin\permissions\ManageModules;

class Events extends BaseObject
{

    public static function onAdminMenuInit($event)
    {
        if (!Yii::$app->user->can(ManageModules::class)) {
            return;
        }

        /** @var AdminMenu $menu */
        $menu = $event->sender;

        $menu->addEntry(new MenuLink([
            'label' => Yii::t('WeatherModule.base', 'Weather Settings'),
            'url' => Url::toRoute('/weather/admin/index'),
            'icon' => Icon::get('cloud'),
            'isActive' => Yii::$app->controller->module && Yii::$app->controller->module->id == 'weather' && Yii::$app->controller->id == 'admin',
            'sortOrder' => 650,
            'isVisible' => true,
        ]));
    }

    public static function addWeatherFrame($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->addWidget(widgets\WeatherFrame::class, [], ['sortOrder' => Yii::$app->getModule('weather')->settings->get('sortOrder')]);
    }
}

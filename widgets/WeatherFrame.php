<?php

namespace gm\modules\weather\widgets;

use Yii;
use humhub\components\Widget;

/**
 *
 * @author Felli
 */
class WeatherFrame extends Widget
{
    public $contentContainer;

    /**
     * @inheritdoc
     */
    public function run()
    {
        // Forecast7 weather URL e.g: https://forecast7.com/{language}/{id}/{location}
        $url = Yii::$app->getModule('weather')->getServerUrl() . '';

        // {language} refers to default user language where Yii::$app-language is used as user's language controller
        $url = str_replace('{language}', substr(Yii::$app->language, 0, 2), $url);

        // Default location of the global widget
        $location = Yii::$app->getModule('weather')->getLocation();

        if(!$url || !$location) {
            return '';
        }

        return $this->render('weatherframe', ['weatherUrl' => $url, 'location' => $location]);
    }
}

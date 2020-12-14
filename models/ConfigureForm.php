<?php

namespace gm\modules\weather\models;

use Yii;
use yii\base\Model;

/**
 * ConfigureForm defines the configurable fields.
 */
class ConfigureForm extends Model
{

    public $serverUrl;
    public $location;

    /**
     * Sort the order of the widget
     */
    public $sortOrder;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['serverUrl', 'required'],
            ['location', 'required'],
            ['sortOrder', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serverUrl' => Yii::t('WeatherModule.base', 'Forecast7 Weather URL:'),
            'location' => Yii::t('WeatherModule.base', 'Location where you\'re located:'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'serverUrl' => Yii::t('WeatherModule.base', 'e.g. https://forecast7.com/{language}/{id}/{location}/ or https://forecast7.com/{language}/{id}/{location}/?unit=us'),
            'location' => Yii::t('WeatherModule.base', 'e.g. New York'),
        ];
    }

    public function loadSettings()
    {
        $this->serverUrl = Yii::$app->getModule('weather')->settings->get('serverUrl');

        $this->location = Yii::$app->getModule('weather')->settings->get('location');

        $this->sortOrder = Yii::$app->getModule('weather')->settings->get('sortOrder');

        return true;
    }

    public function save()
    {
        Yii::$app->getModule('weather')->settings->set('serverUrl', $this->serverUrl);

        Yii::$app->getModule('weather')->settings->set('location', $this->location);

        Yii::$app->getModule('weather')->settings->set('sortOrder', $this->sortOrder);

        return true;
    }

}

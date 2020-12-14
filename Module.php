<?php

namespace gm\modules\weather;

use Yii;
use yii\helpers\Url;
use humhub\components\Module as BaseModule;

class Module extends BaseModule
{

    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/weather/admin/index']);
    }

    public function getServerUrl()
    {
        $url = $this->settings->get('serverUrl');
        if (empty($url)) {
            return 'https://forecast7.com/';
        }
        return $url;
    }

    public function getLocation()
    {
        $location = $this->settings->get('location');
        if (empty($location)) {
            return '';
        }
        return $location;
    }

    public function getOrder()
    {
        $sortOrder = $this->settings->get('sortOrder');
        if (empty($sortOrder)) {
            return '100';
        }
        return $sortOrder;
    }
}

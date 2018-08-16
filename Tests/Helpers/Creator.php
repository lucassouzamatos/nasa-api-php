<?php

namespace Nasa\Tests\Helpers;

use Nasa\Imagery\Parameter;

class Creator {

    /**
     * @return Parameter
     */
    public static function createParameterComplete() {
        $parameter = new Parameter();
        $parameter->setApiKey('DEMO_KEY');
        $parameter->setLat(1.5);
        $parameter->setLon(110.75);
        $parameter->setCloudScore(true);
        $parameter->setDim(0.5);

        return $parameter;
    }

    /**
     * @return Parameter
     */
    public static function createParameterIncomplete() {
        $parameter = new Parameter();
        $parameter->setApiKey('DEMO_KEY');
        $parameter->setDim(0.5);

        return $parameter;
    }

}
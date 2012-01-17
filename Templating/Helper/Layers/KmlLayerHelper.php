<?php

namespace Ivory\GoogleMapBundle\Templating\Helper\Layers;

use \Ivory\GoogleMapBundle\Model\Layers\KMLLayer;
//use Ivory\GoogleMapBundle\Model\Map;

/**
 * Kml layer helper allows easy rendering
 *
 * @author Wodor <wodor@wodor.net>
 */
class KmlLayerHelper
{

    /**
     * Renders the map javascript circle
     *
     * @param Ivory\GoogleMapBundle\Model\Overlays\Circle $circle
     * @param Ivory\GoogleMapBundle\Model\Map $map
     */
    public function render(KMLLayer $circle, Map $map)
    {
        $circleOptions = array_merge(
            array('radius' => $circle->getRadius()),
            $circle->getOptions()
        );

        $circleJSONOptions = sprintf('{"map":%s,"center":%s,',
            $map->getJavascriptVariable(),
            $this->coordinateHelper->render($circle->getCenter())
        );

        $circleJSONOptions .= substr(json_encode($circleOptions), 1);

        return sprintf('var %s = new google.maps.Circle(%s);'.PHP_EOL,
            $circle->getJavascriptVariable(),
            $circleJSONOptions
        );
    }

    public function deleteit {
        $rectangleOptions = $rectangle->getOptions();

        $rectangleJSONOptions = sprintf('{"map":%s,"bounds":%s',
            $map->getJavascriptVariable(),
            $rectangle->getBound()->getJavascriptVariable()
        );

        if(!empty($rectangleOptions))
            $rectangleJSONOptions .= ','.substr(json_encode($rectangleOptions), 1);
        else
            $rectangleJSONOptions .= '}';

        $html = array();

        $html[] = $this->boundHelper->render($rectangle->getBound());
        $html[] = sprintf('var %s = new google.maps.Rectangle(%s);'.PHP_EOL,
            $rectangle->getJavascriptVariable(),
            $rectangleJSONOptions
        );

        return implode('', $html);
    }

}

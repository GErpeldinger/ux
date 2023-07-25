<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Builder;

use Symfony\UX\MapUx\Model\Layer;
use Symfony\UX\MapUx\Model\Map;

/**
 * @final
 */
class MapBuilder implements MapBuilderInterface
{
    /**
     * Create a Map from coordinate.
     */
    public function createMap(float $latitude, float $longitude, int $zoom): Map
    {
        $map = new Map($latitude, $longitude, $zoom);
        $map->setStimulusController(Map::LEAFLET_CONTROLLER);

        $background = new Layer();
        $background->setUrl('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');

        $map->setBackground($background);

        return $map;
    }
}

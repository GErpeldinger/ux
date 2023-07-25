<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Builder;

use Symfony\UX\MapUx\Model\MapInterface;

/**
 * @experimental
 */
interface MapBuilderInterface
{
    /**
     * Create a Map from coordinate.
     */
    public function createMap(float $latitude, float $longitude, int $zoom): MapInterface;
}

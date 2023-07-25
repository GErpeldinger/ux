<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 *
 * @property float                 $latitude
 * @property float                 $longitude
 * @property TooltipInterface|null $tooltip
 */
interface MarkerInterface
{
    /**
     * MarkerInterface constructor.
     */
    public function __construct(float $latitude, float $longitude);

    /**
     * Return the position of the marker.
     *
     * @return float[]
     */
    public function getPosition(): array;

    /**
     * Get the latitude of the marker.
     */
    public function getLatitude(): float;

    /**
     * Set the latitude of the marker.
     */
    public function setLatitude(float $latitude): void;

    /**
     * Get the longitude of the marker.
     */
    public function getLongitude(): float;

    /**
     * Set the longitude of the marker.
     */
    public function setLongitude(float $longitude): void;

    /**
     * Get the marker tooltip.
     *
     * @return TooltipInterface|null $tooltip
     */
    public function getTooltip(): ?TooltipInterface;

    /**
     * Set a tooltip to the marker.
     */
    public function setTooltip(?TooltipInterface $tooltip): void;
}

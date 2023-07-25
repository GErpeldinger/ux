<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 */
class Marker implements MarkerInterface
{
    private float $latitude;

    private float $longitude;

    private ?TooltipInterface $tooltip = null;

    private ?TooltipInterface $popup = null;

    public function __construct(float $latitude, float $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getPosition(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): void
    {
        $this->longitude = $longitude;
    }

    public function getTooltip(): ?TooltipInterface
    {
        return $this->tooltip;
    }

    public function setTooltip(?TooltipInterface $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    public function getPopup(): ?TooltipInterface
    {
        return $this->popup;
    }

    public function setPopup(?TooltipInterface $popup): void
    {
        $this->popup = $popup;
    }
}

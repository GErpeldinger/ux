<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 */
class Map implements MapInterface
{
    public const LEAFLET_CONTROLLER = '@symfony--map-ux--leaflet';

    private string $controller;

    private ?LayerInterface $background = null;

    /** @var LayerInterface[]|null */
    private ?array $layers = null;

    /** @var MarkerInterface[]|null */
    private ?array $markers = null;

    private float $latitude;

    private float $longitude;

    private int $zoom;

    public function __construct(float $latitude, float $longitude, int $zoom)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->zoom = $zoom;
    }

    public function getStimulusController(): string
    {
        return $this->controller;
    }

    public function setStimulusController(string $controller): void
    {
        $this->controller = $controller;
    }

    public function createDataView(): array
    {
        return [
            'center' => $this->getCenter(),
            'zoom' => $this->getZoom(),
        ];
    }

    public function createDataBackground(): ?array
    {
        return [
            'url' => $this->getBackground()->getUrl(),
            'options' => $this->getBackground(),
        ];
    }

    public function createDataLayers(): ?array
    {
        if (null === $this->getLayers()) {
            return [];
        }
        $layers = [];
        foreach ($this->getLayers() as $layer) {
            $layers[] = $layer;
        }

        return $layers;
    }

    public function createDataMarkers(): ?array
    {
        $markersPositions = [];
        if (!$this->markers) {
            return null;
        }

        foreach ($this->markers as $marker) {
            $tooltip = $marker->getTooltip();
            $popup = $marker->getPopup();
            $markersPositions[] = [
                'position' => $marker->getPosition(),
                'tooltip' => $tooltip
                    ? ['content' => $tooltip->getContent(), 'options' => $tooltip->getOptions()]
                    : null,
                'popup' => $popup
                    ? ['content' => $popup->getContent(), 'options' => $popup->getOptions()]
                    : null,
            ];
        }

        return $markersPositions;
    }

    public function getCenter(): array
    {
        return [
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }

    public function getBackground(): LayerInterface
    {
        return $this->background;
    }

    public function setBackground(LayerInterface $background): void
    {
        $this->background = $background;
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

    public function getZoom(): int
    {
        return $this->zoom;
    }

    public function setZoom(int $zoom): void
    {
        $this->zoom = $zoom;
    }

    public function getLayers(): ?array
    {
        return $this->layers;
    }

    public function setLayers(?array $layers): void
    {
        $this->layers = $layers;
    }

    public function addLayer(LayerInterface $layer): void
    {
        $this->layers[] = $layer;
    }

    public function getMarkers(): ?array
    {
        return $this->markers;
    }

    public function setMarkers(?array $markers): void
    {
        $this->markers = $markers;
    }

    public function addMarker(MarkerInterface $marker): void
    {
        $this->markers[] = $marker;
    }
}

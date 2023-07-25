<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 *
 * @property string                 $controller
 * @property LayerInterface|null    $background
 * @property LayerInterface[]|null  $layers
 * @property MarkerInterface[]|null $markers
 * @property float                  $latitude
 * @property float                  $longitude
 * @property int                    $zoom
 */
interface MapInterface
{
    /**
     * Map constructor.
     */
    public function __construct(float $latitude, float $longitude, int $zoom);

    /**
     * Return name of the stimulus controller.
     */
    public function getStimulusController(): string;

    /**
     * Set name of the stimulus controller
     * Can take a custom controller.
     */
    public function setStimulusController(string $controller): void;

    /**
     * Create the data that will be sent to the data-attribute View.
     *
     * @return array eg. [center, zoom]
     */
    public function createDataView(): array;

    /**
     * Create the data that will be sent to the data-attribute Background.
     *
     * @return array|null eg. [url, maxZoom, attribution]
     */
    public function createDataBackground(): ?array;

    /**
     * Create the data that will be sent to the data-attribute Layers.
     *
     * @return array|null eg. [Layer1, Layer2...]
     */
    public function createDataLayers(): ?array;

    /**
     * Create the data that will be sent to the data-attribute Markers.
     *
     * @return array|null eg. [Marker1, Marker2...]
     */
    public function createDataMarkers(): ?array;

    /**
     * Get the center of the map.
     *
     * @return float[] [latitude, longitude]
     */
    public function getCenter(): array;

    /**
     * Get the background tile.
     */
    public function getBackground(): LayerInterface;

    /**
     * Set the background tile.
     */
    public function setBackground(LayerInterface $background): void;

    /**
     * Get the latitude.
     */
    public function getLatitude(): float;

    /**
     * Set the latitude.
     */
    public function setLatitude(float $latitude): void;

    /**
     * Get the longitude.
     */
    public function getLongitude(): float;

    /**
     * Set the longitude.
     */
    public function setLongitude(float $longitude): void;

    /**
     * Get the zoom level.
     */
    public function getZoom(): int;

    /**
     * Set the zoom level.
     */
    public function setZoom(int $zoom): void;

    /**
     * Get all the layers.
     *
     * @return LayerInterface[]|null
     */
    public function getLayers(): ?array;

    /**
     * Set an array of Layer.
     *
     * @param LayerInterface[]|null $layers
     */
    public function setLayers(?array $layers): void;

    /**
     * Add layer to the map.
     *
     * @param LayerInterface $layer
     */
    public function addLayer(LayerInterface $layer): void;

    /**
     * Get all the markers.
     *
     * @return MarkerInterface[]|null
     */
    public function getMarkers(): ?array;

    /**
     * Set an array of Marker.
     *
     * @param MarkerInterface[]|null $markers
     */
    public function setMarkers(?array $markers): void;

    /**
     * Add marker to the map.
     *
     * @param MarkerInterface $marker
     */
    public function addMarker(MarkerInterface $marker): void;
}

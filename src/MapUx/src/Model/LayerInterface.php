<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 *
 * @property string|null $url
 * @property array|null  $options
 */
interface LayerInterface
{
    /**
     * Get the url.
     */
    public function getUrl(): ?string;

    /**
     * Set the url.
     */
    public function setUrl(?string $url): void;

    /**
     * Get the options of the layer.
     */
    public function getOptions(): ?array;

    /**
     * Set options to the layer.
     */
    public function setOptions(?array $options): void;

    /**
     * Add an option to the options of the layer.
     */
    public function addOption(string $key, $value): void;
}

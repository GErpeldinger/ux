<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Model;

/**
 * @experimental
 *
 * @property string     $content
 * @property array|null $options
 */
interface TooltipInterface
{
    /**
     * TooltipInterface constructor.
     */
    public function __construct(string $content);

    /**
     * Get the content of the tooltip.
     */
    public function getContent(): string;

    /**
     * Set the content of the tooltip.
     */
    public function setContent(string $content): void;

    /**
     * Get the options of the tooltip.
     */
    public function getOptions(): ?array;

    /**
     * Set the options of tooltip.
     */
    public function setOptions(?array $options): void;

    /**
     * Add an option to the tooltip options.
     */
    public function addOption(string $key, $value): void;
}

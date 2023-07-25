<?php

declare(strict_types=1);

namespace Symfony\UX\MapUx\Twig;

use Symfony\UX\MapUx\Exception\NotDefinedTokenException;
use Symfony\UX\MapUx\Model\MapInterface;
use Twig\Environment;
use Twig\Error\RuntimeError;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RenderMapExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_map', [$this, 'renderMap'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @throws RuntimeError|NotDefinedTokenException
     */
    public function renderMap(Environment $env, MapInterface $map, array $attributes = null): string
    {
        $view = twig_escape_filter($env, json_encode($map->createDataView()), 'html_attr');
        $background = twig_escape_filter($env, json_encode($map->createDataBackground()), 'html_attr');
        $markers = twig_escape_filter($env, json_encode($map->createDataMarkers()), 'html_attr');

        $id = $attributes['id'] ?? uniqid('MapUx');

        $html = '<div
            id="'.$id.'"
            data-controller="'.$map->getStimulusController().'"
            data-background="'.$background.'"
            data-view="'.$view.'"';

        $html = $this->checkToken($map, $html);

        if ($map->getMarkers()) {
            $html .= ' data-markers="'.$markers.'"';
        }

        if (null !== $attributes) {
            foreach ($attributes as $key => $value) {
                $html .= ' '.$key.'="'.$value.'"';
            }
        }

        $html .= '></div>';

        return trim($html);
    }

    /**
     * @throws NotDefinedTokenException
     */
    private function checkToken(MapInterface $map, string $html): string
    {
        if (str_contains($map->getStimulusController(), 'google-maps')) {
            if (isset($_ENV['GOOGLE_MAPS_TOKEN'])) {
                $html .= ' data-key="'.$_ENV['GOOGLE_MAPS_TOKEN'].'"';
            } else {
                throw new NotDefinedTokenException('GOOGLE_MAPS_TOKEN');
            }
        }

        if (str_contains($map->getStimulusController(), 'mapbox')) {
            if (isset($_ENV['MAP_BOX_TOKEN'])) {
                $html .= ' data-key="'.$_ENV['MAP_BOX_TOKEN'].'"';
            } else {
                throw new NotDefinedTokenException('MAP_BOX_TOKEN');
            }
        }

        return $html;
    }
}

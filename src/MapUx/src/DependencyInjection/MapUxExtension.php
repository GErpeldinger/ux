<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\UX\MapUx\Builder\MapBuilder;
use Symfony\UX\MapUx\Builder\MapBuilderInterface;
use Symfony\UX\MapUx\Twig\RenderMapExtension;
use Twig\Environment;

class MapUxExtension extends Extension
{
    /**
     * @internal
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $container
            ->setDefinition('map-ux.builder', new Definition(MapBuilder::class))
            ->setPublic(false);

        $container
            ->setAlias(MapBuilderInterface::class, 'map-ux.builder')
            ->setPublic(false);

        if (class_exists(Environment::class)) {
            $container
                ->setDefinition('mapux.twig_extension', new Definition(RenderMapExtension::class))
                ->addTag('twig.extension')
                ->setPublic(false);
        }
    }
}

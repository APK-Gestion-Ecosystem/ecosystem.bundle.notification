<?php

namespace Stof\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('ecosystem_notification');

        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('url')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

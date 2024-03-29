<?php

namespace Ecosystem\NotificationBundle\DependencyInjection;

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
            ->scalarNode('signature_key')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

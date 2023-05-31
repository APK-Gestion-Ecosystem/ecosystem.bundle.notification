<?php
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return static function (DefinitionConfigurator $definition) {
    $definition->rootNode()
        ->children()
        ->scalarNode('url')->end()
        ->end()
    ;
};

<?php

namespace Ecosystem\NotificationBundle\DependencyInjection;

use Ecosystem\NotificationBundle\Service\NotificationService;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class EcosystemNotificationExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../../config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition(NotificationService::class);

        $definition->setArgument(0, $config['url']);
        $definition->setArgument(1, $config['signature_key']);
    }
}

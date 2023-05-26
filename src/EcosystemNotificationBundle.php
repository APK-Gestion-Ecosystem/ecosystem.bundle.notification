<?php
namespace Ecosystem\NotificationBundle;

use Ecosystem\NotificationBundle\Service\NotificationService;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurato;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class EcosystemNotificationBundle extends Bundle
{
    public function loadExtension(
        array $config,
        ContainerConfigurator $containerConfigurator,
        ContainerBuilder $containerBuilder
    ): void {
        $containerConfigurator->import('../config/services.yaml');

        $containerConfigurator->services()->get(NotificationService::class);
    }

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->import('../config/definition.php');
    }
}

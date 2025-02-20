<?php

namespace ContainerBAN5Awt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_X6jG5QAService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.X6jG5QA' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.X6jG5QA'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'rendezVousRepository' => ['privates', 'App\\Repository\\RendezVousRepository', 'getRendezVousRepositoryService', true],
        ], [
            'rendezVousRepository' => 'App\\Repository\\RendezVousRepository',
        ]);
    }
}

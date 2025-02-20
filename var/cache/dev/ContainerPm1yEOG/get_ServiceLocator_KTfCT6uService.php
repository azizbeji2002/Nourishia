<?php

namespace ContainerPm1yEOG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KTfCT6uService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.kTfCT6u' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.kTfCT6u'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'dossiersMedicauxRepository' => ['privates', 'App\\Repository\\DossiersMedicauxRepository', 'getDossiersMedicauxRepositoryService', true],
        ], [
            'dossiersMedicauxRepository' => 'App\\Repository\\DossiersMedicauxRepository',
        ]);
    }
}

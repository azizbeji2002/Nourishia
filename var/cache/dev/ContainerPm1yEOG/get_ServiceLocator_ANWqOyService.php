<?php

namespace ContainerPm1yEOG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ANWqOyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.AN_wqOy' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.AN_wqOy'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'rendezVou' => ['privates', '.errored..service_locator.AN_wqOy.App\\Entity\\RendezVous', NULL, 'Cannot autowire service ".service_locator.AN_wqOy": it needs an instance of "App\\Entity\\RendezVous" but this type has been excluded in "config/services.yaml".'],
        ], [
            'rendezVou' => 'App\\Entity\\RendezVous',
        ]);
    }
}

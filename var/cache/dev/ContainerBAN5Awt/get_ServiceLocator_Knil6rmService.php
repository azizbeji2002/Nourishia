<?php

namespace ContainerBAN5Awt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Knil6rmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.Knil6rm' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.Knil6rm'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'docteur' => ['privates', '.errored..service_locator.Knil6rm.App\\Entity\\Docteur', NULL, 'Cannot autowire service ".service_locator.Knil6rm": it needs an instance of "App\\Entity\\Docteur" but this type has been excluded in "config/services.yaml".'],
        ], [
            'docteur' => 'App\\Entity\\Docteur',
        ]);
    }
}

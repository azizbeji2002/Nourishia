<?php

namespace ContainerBAN5Awt;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_Jn8jUFJService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.jn8jUFJ' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.jn8jUFJ'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'consultation' => ['privates', '.errored..service_locator.jn8jUFJ.App\\Entity\\Consultation', NULL, 'Cannot autowire service ".service_locator.jn8jUFJ": it needs an instance of "App\\Entity\\Consultation" but this type has been excluded in "config/services.yaml".'],
            'entityManager' => ['services', 'doctrine.orm.default_entity_manager', 'getDoctrine_Orm_DefaultEntityManagerService', false],
        ], [
            'consultation' => 'App\\Entity\\Consultation',
            'entityManager' => '?',
        ]);
    }
}

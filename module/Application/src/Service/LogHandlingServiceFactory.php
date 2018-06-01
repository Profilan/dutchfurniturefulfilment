<?php
namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LogHandlingServiceFactory
{
    /**
     * @param ContainerInterface|ServiceLocatorInterface
     *
     * @return Mvc
     */
    public function __invoke($container)
    {
        $config = $container->get('config');
        return new LogHandlingService(
            $config['api-logger']
            );
    }
}


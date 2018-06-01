<?php
namespace Application\Authorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

class AuthorizeFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return Authorize
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $config = $config['proauthorize'];
        die();
        
        return new Authorize($config, $serviceLocator);
    }
    
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
        $config = $config['proauthorize'];
        
        return new Authorize($config, $container);
    }
}
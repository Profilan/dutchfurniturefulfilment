<?php
namespace Admin\Controller\Factory;

use Zend\ServiceManager\Factory\AbstractFactoryInterface;
use Admin\Controller\UserController;

class UserControllerFactory implements AbstractFactoryInterface
{
    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\AbstractFactoryInterface::canCreate()
     */
    public function canCreate(\Interop\Container\ContainerInterface $container, $requestedName)
    {
        return class_exists($requestedName);
        
    }

    /**
     * {@inheritDoc}
     * @see \Zend\ServiceManager\Factory\FactoryInterface::__invoke()
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $em = $container->get('doctrine.entitymanager.orm_default');
        $htpasswdService = $container->get('Admin\Service\HtpasswdService');
        
        $options = $container->get('zfcuser_module_options');
        
        return new UserController($em, $htpasswdService, $options);
    }

    
}
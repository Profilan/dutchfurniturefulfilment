<?php
namespace Application\Authorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity;

class AuthenticationDoctrineEntityFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        // TODO Auto-generated method stub
        echo 'Hello';
        die();
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(\Interop\Container\ContainerInterface $container, $requestedName, array $options = null)
    {
        $authService = $container->get('zfcuser_auth_service');
        $identityProvider = new AuthenticationDoctrineEntity($authService);
        
        $config = $container->get('Config');
        $identityProvider->setDefaultRole($config['proauthorize']['default_role']);
        
        return $identityProvider;
    }

    
}
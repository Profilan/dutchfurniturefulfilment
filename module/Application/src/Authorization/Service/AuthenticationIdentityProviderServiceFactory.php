<?php

/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Authorization\Service;

use Application\Authorization\Provider\Identity\AuthenticationIdentityProvider;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Interop\Container\ContainerInterface;

/**
 * Simple authentication provider factory
 *
 * @author Ingo Walz <ingo.walz@googlemail.com>
 */
class AuthenticationIdentityProviderServiceFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $user = $serviceLocator->get('zfcuser_user_service');

        $simpleIdentityProvider = new AuthenticationIdentityProvider($user->getAuthService());
        $config = $serviceLocator->get('Config');
        $simpleIdentityProvider->setDefaultRole($config['bjyauthorize']['default_role']);
        $simpleIdentityProvider->setAuthenticatedRole($config['bjyauthorize']['authenticated_role']);

        return $simpleIdentityProvider;
    }
    
    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $user = $container->get('zfcuser_user_service');
        
        $simpleIdentityProvider = new AuthenticationIdentityProvider($user->getAuthService());
        $config = $container->get('Config');
        $simpleIdentityProvider->setDefaultRole($config['proauthorize']['default_role']);
        $simpleIdentityProvider->setAuthenticatedRole($config['proauthorize']['authenticated_role']);
        
        return $simpleIdentityProvider;
    }

}

<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Interop\Container\ContainerInterface;
use Application\Authorization\Service\AuthorizeAwareInterface;
use Application\Authorization\View\UnauthorizedStrategy;
use Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity;
use Application\Service\LogHandlingService;

return array(
    'initializers' => array(
        function (ContainerInterface $container, $instance) {
            if ($instance instanceof AuthorizeAwareInterface) {
                /* @var $authorize \Application\Authorization\Service\Authorize */
                $authorize = $container->get('Application\Authorization\Service\Authorize');
                
                $instance->setAuthorizeService($authorize);
            }
        }
        ),
        'factories' => array(
            'Application\Authorization\Service\Authorize' => 'Application\Authorization\Service\AuthorizeFactory',

//             'Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity' => function (ContainerInterface $container) {
//                 /* @var $authService \Zend\Authentication\AuthenticationService */
//                 $authService = $container->get('zfcuser_auth_service');
            
//                 return new AuthenticationDoctrineEntity($authService);
//             },
            
            'Application\Authorization\View\UnauthorizedStrategy' => function (ContainerInterface $container) {
                $config = $container->get('Config');
            
                return new UnauthorizedStrategy($config['proauthorize']['template']);
            },
            
            'Application\Authorization\Provider\Role\Doctrine' => 'Application\Authorization\Service\DoctrineRoleProviderFactory',
            
            'LogHandling' => function(ContainerInterface $container) {
                $service = new LogHandlingService($container->get('Config'));
            
                return $service;
            },
        ),
    );

<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'doctrine' => [
        'driver' => [
            'app_entities' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => __DIR__ . '/../src/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Application\\Entity' => 'app_entities',
                ],
            ],
        ],
    ],
    'proauthorize' => array(
        'default_role'          => 'guest',
        'identity_provider'     => 'Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity',
        'unauthorized_strategy' => 'Application\Authorization\View\UnauthorizedStrategy',
        'role_providers'        => array(),
        'resource_providers'    => array(),
        'rule_providers'        => array(),
        'guards'                => array(),
        'template'              => 'error/403',
    ),
    'service_manager' => array(
        'factories' => array(
//             'Application\Authorization\Provider\Identity\AuthenticationIdentityProvider' => 'Application\Authorization\Provider\Identity\AuthenticationIdentityProviderServiceFactory',
            'Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity' => 'Application\Authorization\Service\AuthenticationDoctrineEntityFactory',
            'Application\Authorization\Provider\Role\DoctrineEntity' => 'Application\Authorization\Service\DoctrineEntityRoleProviderFactory',
        ),
    ),
];

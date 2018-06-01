<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
            
        ),
        'factories' => array(
            'Admin\Controller\User' => 'Admin\Controller\Factory\UserControllerFactory',
            'Admin\Controller\Url' => 'Admin\Controller\Factory\UrlControllerFactory',
            'Admin\Controller\Role' => 'Admin\Controller\Factory\RoleControllerFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type'    => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route'    => '/admin',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        '__NAMESPACE__' => 'Admin\Controller',
                        'controller'    => 'Admin',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'user' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/user[/:action][/:id]',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'User',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'url' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/url[/:action][/:id]',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Url',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'role' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/role[/:action][/:id]',
                            'defaults' => array(
                                '__NAMESPACE__' => 'Admin\Controller',
                                'controller' => 'Role',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'Admin' => __DIR__ . '/../view',
            'zfc-user' => __DIR__ . '/../view',
        ),
    ),
    'HtpasswdManager' => array(
        // Carefull! File needs to be writeable by apache-user (www-data)
        // The .htaccess file needs to be set to use this .htpasswd file for authentication
        'htpasswd' => 'data/users.htpasswd',
        
        // Users, that can't be deleted with the GUI
        'not_deletable_users' => array(
            'admin'
        ),
        
        // May be an array (for specific users) or boolean for general true / false
        'usermanagement_users' => true
    )
);

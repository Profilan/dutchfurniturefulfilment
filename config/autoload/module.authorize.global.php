<?php

return array(
    'proauthorize' => array(
        'default_role' => 'guest',
        'identity_provider' => 'Application\Authorization\Provider\Identity\AuthenticationDoctrineEntity',
        'role_providers' => array(
            'Application\Authorization\Provider\Role\DoctrineEntity' => array(
                'role_entity_class' => 'Application\Entity\Role'
            ),
        ),
        'resource_providers' => array(
            'Application\Authorization\Provider\Resource\Config' => array(
                'user' => [],
                'role' => [],
                'url' => [],
            ),
        ),
        'rule_providers' => array(
            'Application\Authorization\Provider\Rule\Config' => array(
                'allow' => [
                    [['superadmin', 'admin'], 'user', ['user_admin']],
                    [['superadmin'], 'role', ['role_admin']],
                    [['superadmin'], 'url', ['url_admin']],
                ],
            ),
        ),
    ),
);
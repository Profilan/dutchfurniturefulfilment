<?php
namespace Application\Authorization\Provider\Role;

interface ProviderInterface
{
    /**
     * @return \Zend\Permissions\Acl\Role\RoleInterface[]
     */
    public function getRoles();
}
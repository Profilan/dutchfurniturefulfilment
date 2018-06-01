<?php
namespace Application\Authorization\Provider\Identity;

interface ProviderInterface
{
    /**
     * Retrieve roles for the current identity
     *
     * @return string[]|\Zend\Permissions\Acl\Role\RoleInterface[]
     */
    public function getIdentityRoles();
    /**
     * @return string|\Zend\Permissions\Acl\Role\RoleInterface
     */
    public function getDefaultRole();
    /**
     * @param string|\Zend\Permissions\Acl\Role\RoleInterface $role
     *
     * @return void
     */
    public function setDefaultRole($role);
}
<?php
namespace Application\Authorization\Acl;

use Zend\Permissions\Acl\Role\RoleInterface;

interface HierarchicalRoleInterface extends RoleInterface
{
    /**
     * Get the parent role
     *
     * @return \Zend\Permissions\Acl\Role\RoleInterface|null
     */
    public function getParent();
}
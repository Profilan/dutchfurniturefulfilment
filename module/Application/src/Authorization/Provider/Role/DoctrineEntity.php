<?php
namespace Application\Authorization\Provider\Role;

use Doctrine\Common\Persistence\ObjectRepository;
use Zend\Permissions\Acl\Role\RoleInterface;
use Application\Authorization\Acl\HierarchicalRoleInterface;
use Application\Authorization\Acl\Role;

class DoctrineEntity implements ProviderInterface
{
    /**
     * 
     * @var ObjectRepository
     */
    protected $objectRepository;
    
    public function __construct(ObjectRepository $objectRepository)
    {
        $this->objectRepository = $objectRepository;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {
        $result = $this->objectRepository->findAll();
        $roles = array();
        
        foreach ($result as $role) {
            if (!$role instanceof RoleInterface) {
                continue;
            }
            
            $roleId = $role->getRoleId();
            $parent  = null;
            
            if ($role instanceof HierarchicalRoleInterface && $parent = $role->getParent()) {
                $parent = $parent->getRoleId();
            }
            
            $roles[$roleId] = new Role($roleId, $parent);
        }

        foreach ($roles as $roleObj) {
            
            $parentRoleObj = $roleObj->getParent();
            
            if ($parentRoleObj) {
                $roleObj->setParent($roles[$parentRoleObj]);
            }
                         
        }
        
        return array_values($roles);
    }

    
    
}
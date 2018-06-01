<?php
namespace Application\Authorization\Acl;

use Zend\Permissions\Acl\Role\RoleInterface;

class Role implements RoleInterface
{
    /**
     * 
     * @var string
     */
    protected $roleId;
    
    /**
     * 
     * @var RoleInterface
     */
    protected $parent;
    
    /**
     * 
     * @param string|null $roleId
     * @param RoleInterface $parent
     */
    public function __construct($roleId = null, $parent = null)
    {
        if (null !== $roleId) {
            $this->setRoleId($roleId);
        }
        if (null !== $parent) {
            $this->setParent($parent);
        }
    }
    
    /**
     * @return the $roleId
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * @param string $roleId
     * 
     * @return self
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        
        return $this;
    }

    /**
     * @return the $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param RoleInterface $parent
     * 
     * @throws \InvalidArgumentException
     * 
     * @return self
     */
    public function setParent($parent)
    {
        if (null === $parent) {
            $this->parent = null;
            
            return $this;
        }
        
        if (is_string($parent)) {
            $this->parent = $parent;
            
            return $this;
        }
        
        if ($parent instanceof RoleInterface) {
            $this->parent = $parent;
            return $this;
        }
        
        throw new \InvalidArgumentException(sprintf(
            'Expected string or Zend\Permissions\Acl\Role\RoleInterface instance; received "%s"',
            (is_object($parent) ? get_class($parent) : gettype($parent))
        ));
    }

    
}
<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Application\Authorization\Acl\HierarchicalRoleInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_API_ROLES")
 */
class Role implements HierarchicalRoleInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", unique=true, name="role_id")
     *
     * @var string
     */
    protected $roleId;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Role")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="role_id")
     * 
     * @var Role
     */
    protected $parent;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
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
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;
        return $this;
    }
    
    /**
     * 
     * @return Role
     */
    public function getParent()
    {
        return $this->parent;
    }
    
    /**
     * 
     * @param Role $parent
     */
    public function setParent(Role $parent)
    {
        $this->parent = $parent;
    }
 }
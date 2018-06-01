<?php
namespace Application\Authorization\Provider\Identity;

use Zend\Authentication\AuthenticationService;
use Zend\Permissions\Acl\Role\RoleInterface;
use Application\Entity\User;

class AuthenticationDoctrineEntity implements ProviderInterface
{
    /**
     * 
     * @var AuthenticationService
     */
    protected $authService;
    
    /**
     * 
     * @var RoleInterface
     */
    protected $defaultRole;
    
    public function __construct(AuthenticationService $authService)
    {
        $this->authService = $authService;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getIdentityRoles()
    {
        if (!$this->authService->hasIdentity()) {
            return array($this->getDefaultRole());
        }
        
        /**
         * 
         * @var User $user
         */
        $user = $this->authService->getIdentity();
        
//         echo get_class($user);
        
//         if (!($user instanceof RoleInterface || $user instanceof RoleProviderInterface)) {
//             echo 'Hello';
            
//             return array($this->getDefaultRole());
//         }
        
//         if ($user instanceof RoleInterface) {
//             return array($user->getRoleId());
//         }
        
        /*
         * @var $user RoleProviderInterface
         */
        
        $roles = array();
        
        foreach ($user->getRoles() as $role) {
            $roles[] = $role->getRoleId();
        }
        
        return $roles;
    }

    /**
     * {@inheritDoc}
     */
    public function getDefaultRole()
    {
        return $this->defaultRole;
     }

    /**
     * {@inheritDoc}
     */
    public function setDefaultRole($role)
    {
        $this->defaultRole = $role;
    }
}
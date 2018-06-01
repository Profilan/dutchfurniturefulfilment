<?php
namespace Admin\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use Application\Authorization\Service\AuthorizeAwareInterface;
use Application\Authorization\Service\Authorize;

class IsAllowed extends AbstractPlugin implements AuthorizeAwareInterface
{
    /**
     * 
     * @var Authorize
     */
    protected $authorizeService;
    
    public function __construct(Authorize $authorizeService)
    {
        $this->authorizeService = $authorizeService;
    }
    
    /**
     * 
     * @param mixed $resource
     * @param mixed|null $privilege
     * @return boolean
     */
    public function __invoke($resource, $privilege = null)
    {
        return $this->authorizeService->isAllowed($resource, $privilege);
    }
    
    public function getAuthorizeService()
    {
        return $this->authorizeService;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setAuthorizeService(Authorize $auth)
    {
        $this->authorizeService = $auth;
        
        return $this;
    }

}
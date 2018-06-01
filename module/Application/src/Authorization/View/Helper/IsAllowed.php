<?php
namespace Application\Authorization\View\Helper;
use Zend\View\Helper\AbstractHelper;
use Application\Authorization\Service\Authorize;
use Application\Authorization\Service\AuthorizeAwareInterface;
/**
 * IsAllowed View helper. Allows checking access to a resource/privilege in views.
 *
 * @author Ben Youngblood <bx.youngblood@gmail.com>
 */
class IsAllowed extends AbstractHelper implements AuthorizeAwareInterface
{
    /**
     * @var Authorize
     */
    protected $authorizeService;
    
    /**
     * @param Authorize $authorizeService
     */
    public function __construct(Authorize $authorizeService)
    {
        $this->authorizeService = $authorizeService;
    }
    
    /**
     * @param mixed      $resource
     * @param mixed|null $privilege
     *
     * @return bool
     */
    public function __invoke($resource, $privilege = null)
    {
        return $this->authorizeService->isAllowed($resource, $privilege);
    }
    
    /**
     * @return Authorize
     */
    public function getAuthorizeService()
    {
        return $this->authorizeService;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setAuthorizeService(Authorize $authorize)
    {
        $this->authorizeService = $authorize;
        return $this;
    }
}
<?php
namespace Application\Authorization;

use ZF\MvcAuth\MvcAuthEvent;
use Doctrine\ORM\EntityManager;
use Application\Entity\User;
use Zend\Http\Request;
use Zend\Http\Response;

class AuthorizationListener
{
    /**
     * 
     * @var EntityManager
     */
    var $entityManager;
    
    /**
     * 
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
       $this->entityManager = $em; 
    }
    
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $mvcEvent = $mvcAuthEvent->getMvcEvent();

        $request  = $mvcEvent->getRequest();
        if (! $request instanceof Request) {
            return;
        }

        $response  = $mvcEvent->getResponse();
        if (! $response instanceof Response) {
            return;
        }
        /** @var \ZF\MvcAuth\Authorization\AclAuthorization $authorization */
        $authorization = $mvcAuthEvent->getAuthorizationService();
        
        $identity = $mvcAuthEvent->getIdentity();
        $username = $identity->getAuthenticationIdentity();
        
        if ($username) {
        
            $uri = $request->getUri();
            $path = explode('/', $uri->getPath());
            
            /**
             * 
             * @var User $user
             */
            $user = $this->entityManager->getRepository('Application\\Entity\\User')->findBy(array(
                'username' => $username
            ))[0];
            
            $url = $this->entityManager->getRepository('Application\\Entity\\Url')->findBy(array(
                'urlName' => $path[2]
            ))[0];
            
            if (!$user->getUrls()->contains($url)) {
                return false;
            }
        
       }
    }
}
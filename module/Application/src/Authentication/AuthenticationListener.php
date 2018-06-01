<?php
namespace Application\Authentication;

use ZF\MvcAuth\MvcAuthEvent;
use Doctrine\ORM\EntityManager;
use Application\Entity\User;
use Zend\Http\Request;
use Zend\Http\Response;

class AuthenticationListener
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
        
        $authorization = $mvcAuthEvent->getAuthenticationService();
        
        $identity = $mvcAuthEvent->getIdentity();
        $username = $identity->getAuthenticationIdentity();
        
//        if ($username) {
        
//             /**
//              * 
//              * @var User $item
//              */
//             $item = $this->entityManager->getRepository('Application\\Entity\\User')->findBy(array(
//                 'username' => $username
//             ))[0];
            
//             if ($item->getApikey() != $request->getQuery('apikey')) {
                
//                 return false;
//             }
        
//        }
    }
}
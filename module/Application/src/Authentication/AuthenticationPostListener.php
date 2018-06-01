<?php
namespace Application\Authentication;

use Zend\Http\Response as HttpResponse;
use ZF\MvcAuth\MvcAuthEvent;
use Doctrine\ORM\EntityManager;
use Application\Entity\User;
use Zend\Http\Request as HttpRequest;


class AuthenticationPostListener
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
    
    /**
     * Determine if we have an authentication failure, and, if so, return a 401 response
     *
     * @param MvcAuthEvent $mvcAuthEvent
     * @return null|\Zend\Http\Response
     */
    public function __invoke(MvcAuthEvent $mvcAuthEvent)
    {
        $mvcEvent = $mvcAuthEvent->getMvcEvent();
        
        $response = $mvcEvent->getResponse();
        if (! $response instanceof HttpResponse) {
            return $response;
        }
        $request = $mvcEvent->getRequest();
        if (! $request instanceof HttpRequest) {
            return $request;
        }
        
        $identity = $mvcAuthEvent->getIdentity();
        $username = $identity->getAuthenticationIdentity();
        
        if ($username) {

            /**
             *
             * @var User $user
             */
            $user = $this->entityManager->getRepository('Application\\Entity\\User')->findBy(array(
                'username' => $username
            ))[0];
            
            $adminRole = $this->entityManager->getRepository('Application\\Entity\\Role')->findBy(array(
                'roleId' => 'admin',
            ))[0];
            
            if ($user->getRoles()->contains($adminRole)) {
                return;
            }

            if ($user->getApikey() != $request->getQuery('apikey')) {
               
                $response->setStatusCode(401);
                $response->setReasonPhrase('Unauthorized');
                
                $response->setContent('{"title": "Unauthorized","status": 401,"detail":"The apikey you provided is wrong or is not set"}');
                
                return $response;
            }

       }
        
        
    }
}

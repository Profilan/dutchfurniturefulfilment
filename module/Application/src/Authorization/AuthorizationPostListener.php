<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application\Authorization;

use Zend\Http\Response;
use ZF\MvcAuth\MvcAuthEvent;
use Doctrine\ORM\EntityManager;
use Application\Entity\User;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;


class AuthorizationPostListener
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
     * Determine if we have an authorization failure, and, if so, return a 403 response
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
            
            foreach ($user->getUrls() as $url) {
                echo $url->getName();
            }
            
            die();
            
        }
    }
}

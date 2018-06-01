<?php
namespace Application\Doctrine\Event;

use Doctrine\ORM\EntityManager;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

class UpdatePostListener
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
    
    public function __invoke(DoctrineResourceEvent $doctrineResourceEvent)
    {
        $resourceEvent = $doctrineResourceEvent->getResourceEvent();
        $identity = $resourceEvent->getIdentity();
        
        $username = $identity->getAuthenticationIdentity();
        
        $user = null;
        if ($username) {
            
            /**
             *
             * @var User $item
             */
            $user = $this->entityManager->getRepository('Application\\Entity\\User')->findBy(array(
                'username' => $username
            ))[0];
        }
        
        $entity = $doctrineResourceEvent->getEntity();
        if (method_exists($entity, 'setSysModified')) {
            $entity->setSysModified(new \DateTime());
        }
        if (method_exists($entity, 'setSysModifier') && $user != null) {
            $entity->setSysModifier(99999);
        }
    }
    
}
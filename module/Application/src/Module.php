<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014-2016 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Application;

use ZF\MvcAuth\MvcAuthEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Application\Authentication\AuthenticationPostListener;
use Zend\EventManager\SharedEventManager;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;
use Application\Doctrine\Event\CreatePostListener;
use Application\Doctrine\Event\UpdatePostListener;
use Interop\Container\ContainerInterface;
use Application\Authorization\View\Helper\IsAllowed;
use Application\Authorization\AuthorizationListener;
use Zend\Log\Logger;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        
        $app      = $e->getApplication();
        $sm = $app->getServiceManager();
        
        $em = $sm->get('doctrine.entitymanager.orm_default');

        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHENTICATION_POST,
            new AuthenticationPostListener($em),
            100
            );
        
        
        $eventManager->attach(
            MvcAuthEvent::EVENT_AUTHORIZATION,
            new AuthorizationListener($em),
            100
            );
        
//         $eventManager->attach(MvcEvent::EVENT_ROUTE,
            
//             function(MvcEvent $e) {
//                 $sm = $e->getApplication()->getServiceManager();
//                 /**
//                  *
//                  * @var LogHandlingService $service
//                  */
//                 $service = $sm->get('LogHandling');
                
//                 $matches = $e->getRouteMatch();
                
//                 $service->log('Routing event', Logger::INFO, array(
//                     'url' => $matches->getMatchedRouteName(),
                    
//                 ));
                
//             });
        
        /**
         * 
         * @var SharedEventManager $sharedEvents
         */
        $sharedEvents = $sm->get('SharedEventManager');
        $sharedEvents->attach('ZF\Apigility\Doctrine\DoctrineResource', 
            DoctrineResourceEvent::EVENT_CREATE_POST, new CreatePostListener($em)
        );
        $sharedEvents->attach('ZF\Apigility\Doctrine\DoctrineResource',
            DoctrineResourceEvent::EVENT_UPDATE_POST, new UpdatePostListener($em)
            );
        
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    
    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return include __DIR__ . '/../config/services.config.php';
    }
    
    /**
     * {@inheritDoc}
     */
    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                Authorization\View\Helper\IsAllowed::class => function(ContainerInterface $container) {
                    $auth = $container->get('Application\Authorization\Service\Authorize');
                    
                    return new IsAllowed($auth);
                }
            ],
            'aliases' => [
                'isAllowed' => Authorization\View\Helper\IsAllowed::class
            ]
        ];
    }
}

<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Admin for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Admin\Service\HtpasswdService;
use Interop\Container\ContainerInterface;
use Admin\Controller\Plugin\IsAllowed;

class Module implements AutoloaderProviderInterface
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . str_replace('\\', '/' , __NAMESPACE__),
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
    
    public function getServiceConfig() 
    {
        return array(
            'factories' => array(
                'Admin\Service\HtpasswdService' => function ($sm) {
                $config = $sm->get ( 'Config' );
                
                if (! isset ( $config ['HtpasswdManager'] ) || ! is_array ( $config ['HtpasswdManager'] ) || ! isset ( $config ['HtpasswdManager'] ['htpasswd'] ) || empty ( $config ['HtpasswdManager'] ['htpasswd'] )) {
                    throw new \Exception ( 'HtpasswdManager Config not found' );
                }
                
                $htpasswd_filename = $config ['HtpasswdManager'] ['htpasswd'];
                $service = new HtpasswdService( $htpasswd_filename );
                
                return $service;
                }
            ) 
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getControllerPluginConfig()
    {
        return array(
            'factories' => array(
                'isAllowed'=> function (ContainerInterface $container) {
                    /* @var $authorize \BjyAuthorize\Service\Authorize */
                    $authorize = $container->get('Application\Authorization\Service\Authorize');
                    return new IsAllowed($authorize);
                }
            ),
        );
    }
    
}

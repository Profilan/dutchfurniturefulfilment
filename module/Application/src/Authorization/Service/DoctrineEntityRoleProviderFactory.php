<?php
namespace Application\Authorization\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Authorization\Provider\Role\DoctrineEntity;
use Interop\Container\ContainerInterface;

class DoctrineEntityRoleProviderFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function createService(ServiceLocatorInterface $services)
    {
        return $this($services, DoctrineEntity::class);
    }

    /**
     * {@inheritDoc}
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
       $config = $container->get('Config');
       
       if (!isset($config['proauthorize']['role_providers']['Application\Authorization\Provider\Role\DoctrineEntity']['role_entity_class'])) {
            throw new \InvalidArgumentException('role_entity_class not set in the proauthorize role_providers_config'); 
       }
       
       $roleEntityClass = $config['proauthorize']['role_providers']['Application\Authorization\Provider\Role\DoctrineEntity']['role_entity_class'];
       
       $objectManager = $container->get('doctrine.entitymanager.orm_default');
       $objectRepository = $objectManager->getRepository($roleEntityClass);
        
       return new DoctrineEntity($objectRepository);
    }

    
}
<?php
namespace Application\Authorization\Provider\Resource;

use Zend\Permissions\Acl\Resource\ResourceInterface;

interface ProviderInterface
{
    /**
     * @return ResourceInterface[]
     */
    public function getResources();
}
<?php
namespace Application\Authorization\Provider\Resource;


class Config implements ProviderInterface
{
    /**
     * @var \Zend\Permissions\Acl\Resource\ResourceInterface[]
     */
    protected $resources = array();
    
    /**
     * @param \Zend\Permissions\Acl\Resource\ResourceInterface[] $config
     */
    public function __construct(array $config = array())
    {
        $this->resources = $config;
    }
    /**
     * {@inheritDoc}
     */
    public function getResources()
    {
        return $this->resources;
    }
}
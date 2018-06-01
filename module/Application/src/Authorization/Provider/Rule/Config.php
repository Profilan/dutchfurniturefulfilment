<?php
namespace Application\Authorization\Provider\Rule;


class Config implements ProviderInterface
{
    /**
     * @var array
     */
    protected $rules = array();
    /**
     * @param array $config
     */
    public function __construct(array $config = array())
    {
        $this->rules = $config;
    }
    /**
     * {@inheritDoc}
     */
    public function getRules()
    {
        return $this->rules;
    }
}
<?php
namespace Application\Authorization\Provider\Rule;

interface ProviderInterface
{
    /**
     * @return array
     */
    public function getRules();
}
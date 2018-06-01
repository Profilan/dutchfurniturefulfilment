<?php
namespace Application\Authorization\Service;

interface AuthorizeAwareInterface
{
    public function setAuthorizeService(Authorize $auth);
}
<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_API_URLS")
 */
class Url
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="string", name="id")
     *
     * @var integer
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", name="name")
     *
     * @var string
     */
    protected $urlName;
    
    /**
     * @ORM\ManyToMany(targetEntity="Application\Entity\User", inversedBy="urls")
     * @ORM\JoinTable(name="EEK_API_USER_URLS")
     *
     * @var ArrayCollection 
     */
    protected $users;
    
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $urlName
     */
    public function getUrlName()
    {
        return $this->urlName;
    }

    /**
     * @param string $urlName
     */
    public function setUrlName($urlName)
    {
        $this->urlName = $urlName;
        return $this;
    }

    /**
     * 
     * @param User $user
     */
    public function addUser(User $user)
    {
        $this->users[] = $user;
    }
    
    /**
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
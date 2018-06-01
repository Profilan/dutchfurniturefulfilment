<?php
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZfcUser\Entity\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_API_USERS")
 */
class User implements UserInterface
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
     * @ORM\Column(type="string", name="username")
     * 
     * @var string
     */
    protected $username;
    
    /**
     * @ORM\Column(type="string", name="displayName")
     *
     * @var string
     */
    protected $displayName;
    
    /**
     * @ORM\Column(type="string", name="email")
     *
     * @var string
     */
    protected $email;
    
    /**
     * @ORM\Column(type="string", name="password")
     *
     * @var string
     */
    protected $password;
    
    /**
     * @ORM\Column(type="string", name="apikey")
     * 
     * @var string
     */
    protected $apikey;
    
    /**
     * @ORM\Column(type="string", name="debcode")
     *
     * @var string
     */
    protected $debcode;
    
    /**
     * @ORM\Column(type="boolean", name="enabled")
     * 
     * @var bool
     */
    protected $enabled;
    
    /**
     * @ORM\Column(type="integer", name="state")
     *
     * @var integer
     */
    protected $state;
    
    /**
     * @ORM\Column(type="string", name="description")
     *
     * @var string
     */
    protected $description;
    
    /**
     * @ORM\Column(type="datetime", name="sysCreated")
     *
     * @var \DateTime
     */
    protected $sysCreated;
    
    /**
     * @ORM\Column(type="integer", name="sysCreator")
     *
     * @var integer
     */
    protected $sysCreator;
    
    /**
     * @ORM\Column(type="datetime", name="sysModified")
     *
     * @var \DateTime
     */
    protected $sysModified;
    
    /**
     * @ORM\Column(type="integer", name="sysModifier")
     *
     * @var integer
     */
    protected $sysModifier;
    
    /**
     * @ORM\ManyToMany(targetEntity="Application\Entity\Url", inversedBy="users")
     * @ORM\JoinTable(name="EEK_API_USER_URLS",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="url_id", referencedColumnName="id")})
     * 
     * @var ArrayCollection
     */
    protected $urls;
    
    /**
     * @ORM\ManyToMany(targetEntity="Application\Entity\Role", inversedBy="users")
     * @ORM\JoinTable(name="EEK_API_USER_ROLES",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="role_id")})
     *
     * @var ArrayCollection
     */
    protected $roles;
    
    public function __construct()
    {
        $this->urls = new ArrayCollection();
        $this->roles = new ArrayCollection();
    }
    
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    
    /**
     * @return the $username
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    
    /**
     * @return the $displayName
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return the $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return the $apikey
     */
    public function getApikey()
    {
        return $this->apikey;
    }
    
    /**
     * @param string $apikey
     */
    public function setApikey($apikey)
    {
        $this->apikey = $apikey;
        return $this;
    }
    
    /**
     * @return the $debcode
     */
    public function getDebcode()
    {
        return $this->debcode;
    }

    /**
     * @param string $debcode
     */
    public function setDebcode($debcode)
    {
        $this->debcode = $debcode;
        return $this;
    }

    /**
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * 
     * @param Url $url
     */
    public function addUrl(Url $url)
    {
        $url->addUser($this);
        $this->urls[] = $url;
    }
    
    /**
     * 
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getUrls()
    {
        return $this->urls;
    }
    
    /**
     *
     * @param Role $role
     */
    public function addRole(Role $role)
    {
        $role->addUser($this);
        $this->roles[] = $role;
    }
    
    /**
     *
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getRoles()
    {
        return $this->roles;
    }
    
    /**
     * @return the $enabled
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return the $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param number $state
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return the $sysCreated
     */
    public function getSysCreated()
    {
        return $this->sysCreated;
    }

    /**
     * @param DateTime $sysCreated
     */
    public function setSysCreated($sysCreated)
    {
        $this->sysCreated = $sysCreated;
        return $this;
    }

    /**
     * @return the $sysCreator
     */
    public function getSysCreator()
    {
        return $this->sysCreator;
    }

    /**
     * @param number $sysCreator
     */
    public function setSysCreator($sysCreator)
    {
        $this->sysCreator = $sysCreator;
        return $this;
    }

    /**
     * @return the $sysModified
     */
    public function getSysModified()
    {
        return $this->sysModified;
    }

    /**
     * @param DateTime $sysModified
     */
    public function setSysModified($sysModified)
    {
        $this->sysModified = $sysModified;
        return $this;
    }

    /**
     * @return the $sysModifier
     */
    public function getSysModifier()
    {
        return $this->sysModifier;
    }

    /**
     * @param number $sysModifier
     */
    public function setSysModifier($sysModifier)
    {
        $this->sysModifier = $sysModifier;
        return $this;
    }
}
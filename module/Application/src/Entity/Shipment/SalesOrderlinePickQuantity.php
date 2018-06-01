<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_ORDERPICKING")
 */
class SalesOrderlinePickQuantity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="Id")
     *
     * @var integer
     */
    protected $id;
    
    /**
     * @ORM\Column(type="integer", name="OrderlineId")
     *
     * @var integer
     */
    protected $orderlineId;
    
    /**
     * @ORM\Column(type="string", name="ItemCode")
     *
     * @var string
     */
    protected $itemcode;
    
    /**
     * @ORM\Column(type="float", name="QuantityPicked")
     *
     * @var float
     */
    protected $quantityPicked;
    
    /**
     * @ORM\Column(type="float", name="QuantityShortage")
     *
     * @var float
     */
    protected $quantityShortage;
    
    /**
     * @ORM\Column(type="string", name="ReasonShortage")
     *
     * @var string
     */
    protected $reasonShortage;
    
    /**
     * @ORM\Column(type="boolean", name="TestIndicator")
     *
     * @var boolean
     */
    protected $test;
    
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
     * @return the $orderlineId
     */
    public function getOrderlineId()
    {
        return $this->orderlineId;
    }

    /**
     * @param number $orderlineId
     */
    public function setOrderlineId($orderlineId)
    {
        $this->orderlineId = $orderlineId;
        return $this;
    }

    /**
     * @return the $itemcode
     */
    public function getItemcode()
    {
        return $this->itemcode;
    }

    /**
     * @param string $itemcode
     */
    public function setItemcode($itemcode)
    {
        $this->itemcode = $itemcode;
        return $this;
    }

    /**
     * @return the $quantityPicked
     */
    public function getQuantityPicked()
    {
        return $this->quantityPicked;
    }

    /**
     * @param number $quantityPicked
     */
    public function setQuantityPicked($quantityPicked)
    {
        $this->quantityPicked = $quantityPicked;
        return $this;
    }

    /**
     * @return the $quantityShortage
     */
    public function getQuantityShortage()
    {
        return $this->quantityShortage;
    }

    /**
     * @param number $quantityShortage
     */
    public function setQuantityShortage($quantityShortage)
    {
        $this->quantityShortage = $quantityShortage;
        return $this;
    }

    /**
     * @return the $reasonShortage
     */
    public function getReasonShortage()
    {
        return $this->reasonShortage;
    }

    /**
     * @param string $reasonShortage
     */
    public function setReasonShortage($reasonShortage)
    {
        $this->reasonShortage = $reasonShortage;
        return $this;
    }

    /**
     * @return the $test
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param boolean $test
     */
    public function setTest($test)
    {
        $this->test = $test;
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
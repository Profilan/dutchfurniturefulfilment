<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_STOCKTRANSACTIONS")
 */
class StockTransaction
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
     * @ORM\Column(type="string", name="Warehouse")
     *
     * @var string
     */
    protected $warehouse;
    
    /**
     * @ORM\Column(type="string", name="WarehouseLocation")
     *
     * @var string
     */
    protected $warehouseLocation;
    
    /**
     * @ORM\Column(type="string", name="ItemCode")
     *
     * @var string
     */
    protected $itemCode;
    
    /**
     * @ORM\Column(type="float", name="Quantity")
     *
     * @var float
     */
    protected $quantity;
    
    /**
     * @ORM\Column(type="integer", name="TransactionType")
     *
     * @var integer
     */
    protected $transactionType;
    
    /**
     * @ORM\Column(type="string", name="Description")
     *
     * @var string
     */
    protected $description;
    
    /**
     * @ORM\Column(type="integer", name="Status")
     *
     * @var integer
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime", name="ProcessDate")
     * 
     * @var \DateTime
     */
    protected $processDate;
    
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
     * @return the $warehouse
     */
    public function getWarehouse()
    {
        return $this->warehouse;
    }

    /**
     * @param string $warehouse
     */
    public function setWarehouse($warehouse)
    {
        $this->warehouse = $warehouse;
        return $this;
    }

    /**
     * @return the $warehouseLocation
     */
    public function getWarehouseLocation()
    {
        return $this->warehouseLocation;
    }

    /**
     * @param string $warehouseLocation
     */
    public function setWarehouseLocation($warehouseLocation)
    {
        $this->warehouseLocation = $warehouseLocation;
        return $this;
    }

    /**
     * @return the $itemCode
     */
    public function getItemCode()
    {
        return $this->itemCode;
    }

    /**
     * @param string $itemCode
     */
    public function setItemCode($itemCode)
    {
        $this->itemCode = $itemCode;
        return $this;
    }

    /**
     * @return the $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param number $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return the $transactionType
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * @param number $transactionType
     */
    public function setTransactionType($transactionType)
    {
        $this->transactionType = $transactionType;
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
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param number $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return the $processDate
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * @param DateTime $processDate
     */
    public function setProcessDate($processDate)
    {
        $this->processDate = $processDate;
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
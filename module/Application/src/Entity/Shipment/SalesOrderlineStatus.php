<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_SALESORDERLINESTATUSSES")
 */
class SalesOrderlineStatus
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
     * @ORM\Column(type="string", name="Carrier")
     *
     * @var string
     */
    protected $carrier;
    
    /**
     * @ORM\Column(type="integer", name="SalesOrderLineId")
     *
     * @var integer
     */
    protected $salesOrderlineId;
    
    /**
     * @ORM\Column(type="integer", name="OrderLineStatus")
     *
     * @var integer
     */
    protected $status;
    
    /**
     * @ORM\Column(type="string", name="OrderLineStatusDescription")
     *
     * @var string
     */
    protected $statusDescription;
    
    /**
     * @ORM\Column(type="datetime", name="TransactionDate")
     *
     * @var \DateTime
     */
    protected $transactionDate;
    
    /**
     * @ORM\Column(type="string", name="TrackTrace")
     *
     * @var string
     */
    protected $trackTrace;
    
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
     * @return the $carrier
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * @param string $carrier
     */
    public function setCarrier($carrier)
    {
        $this->carrier = $carrier;
    }

    /**
     * @return the $salesOrderlineId
     */
    public function getSalesOrderlineId()
    {
        return $this->salesOrderlineId;
    }

    /**
     * @param number $salesOrderlineId
     */
    public function setSalesOrderlineId($salesOrderlineId)
    {
        $this->salesOrderlineId = $salesOrderlineId;
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
     * @return the $statusDescription
     */
    public function getStatusDescription()
    {
        return $this->statusDescription;
    }

    /**
     * @param string $statusDescription
     */
    public function setStatusDescription($statusDescription)
    {
        $this->statusDescription = $statusDescription;
        return $this;
    }
    /**
     * @return the $transactionDate
     */
    public function getTransactionDate()
    {
        return $this->transactionDate;
    }

    /**
     * @param DateTime $transactionDate
     */
    public function setTransactionDate($transactionDate)
    {
        $this->transactionDate = $transactionDate;
    }

    /**
     * @return the $trackTrace
     */
    public function getTrackTrace()
    {
        return $this->trackTrace;
    }

    /**
     * @param string $trackTrace
     */
    public function setTrackTrace($trackTrace)
    {
        $this->trackTrace = $trackTrace;
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
    }

}
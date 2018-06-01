<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_DELIVERYAPPOINTMENT")
 */
class DeliveryAppointment
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
     * @ORM\Column(type="string", name="Type")
     *
     * @var string
     */
    protected $type;
    
    /**
     * @ORM\Column(type="integer", name="DeliveryAppointmentStatus")
     *
     * @var integer
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime", name="DeliveryTimeFrom")
     *
     * @var \DateTime
     */
    protected $deliveryTimeFrom;
    
    /**
     * @ORM\Column(type="datetime", name="DeliveryTimeTo")
     *
     * @var \DateTime
     */
    protected $deliveryTimeTo;
    
    /**
     * @ORM\Column(type="string", name="DeliveryRemark")
     *
     * @var string
     */
    protected $deliveryRemark;
    
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
     * @return the $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return the $deliveryTimeFrom
     */
    public function getDeliveryTimeFrom()
    {
        return $this->deliveryTimeFrom;
    }

    /**
     * @param DateTime $deliveryTimeFrom
     */
    public function setDeliveryTimeFrom($deliveryTimeFrom)
    {
        $this->deliveryTimeFrom = $deliveryTimeFrom;
    }

    /**
     * @return the $deliveryTimeTo
     */
    public function getDeliveryTimeTo()
    {
        return $this->deliveryTimeTo;
    }

    /**
     * @param DateTime $deliveryTimeTo
     */
    public function setDeliveryTimeTo($deliveryTimeTo)
    {
        $this->deliveryTimeTo = $deliveryTimeTo;
    }

    /**
     * @return the $deliveryRemark
     */
    public function getDeliveryRemark()
    {
        return $this->deliveryRemark;
    }

    /**
     * @param string $deliveryRemark
     */
    public function setDeliveryRemark($deliveryRemark)
    {
        $this->deliveryRemark = $deliveryRemark;
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
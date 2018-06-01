<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_SHIPMENTS")
 */
class SalesOrderShipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="Id")
     *
     * @var int
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", name="SKU_Id")
     *
     * @var string
     */
    protected $skuId;
    
    /**
     * @ORM\Column(type="integer", name="ShipmentId")
     *
     * @var integer
     */
    protected $shipmentId;
    
    /**
     * @ORM\Column(type="string", name="DebtorNumber")
     *
     * @var string
     */
    protected $debtorNumber;
    
    /**
     * @ORM\Column(type="string", name="SKU_Type")
     *
     * @var string
     */
    protected $skuType;
    
    /**
     * @ORM\Column(type="string", name="Carrier")
     *
     * @var string
     */
    protected $carrier;
    
    /**
     * @ORM\Column(type="datetime", name="DeliveryDate")
     *
     * @var datetime
     */
    protected $deliveryDate;
    
    /**
     * @ORM\Column(type="string", name="DebtorName")
     *
     * @var string
     */
    protected $debtorName;
    
    /**
     * @ORM\Column(type="string", name="DelAddress")
     *
     * @var string
     */
    protected $delAddress;
    
    /**
     * @ORM\Column(type="string", name="DelPostcode")
     *
     * @var string
     */
    protected $delPostcode;
    
    /**
     * @ORM\Column(type="string", name="DelCity")
     *
     * @var string
     */
    protected $delCity;
    
    /**
     * @ORM\Column(type="string", name="DelCountryCode")
     *
     * @var string
     */
    protected $delCountryCode;
    
    /**
     * @ORM\Column(type="string", name="TrackTraceCode")
     *
     * @var string
     */
    protected $trackTraceCode;
    
    /**
     * @ORM\Column(type="string", name="TrackTraceUrl")
     *
     * @var string
     */
    protected $trackTraceUrl;
    
    /**
     * @ORM\Column(type="integer", name="Status")
     *
     * @var integer
     */
    protected $status;
    
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
     * @return the $shipmentId
     */
    public function getShipmentId()
    {
        return $this->shipmentId;
    }
    
    /**
     * @param number $shipmentId
     */
    public function setShipmentId($shipmentId)
    {
        $this->shipmentId = $shipmentId;
        return $this;
    }
    
    /**
     * @return the $debtorNumber
     */
    public function getDebtorNumber()
    {
        return $this->debtorNumber;
    }
    
    /**
     * @param string $debtorNumber
     */
    public function setDebtorNumber($debtorNumber)
    {
        $this->debtorNumber = $debtorNumber;
        return $this;
    }
    
    /**
     * @return the $skuType
     */
    public function getSkuType()
    {
        return $this->skuType;
    }
    
    /**
     * @param string $skuType
     */
    public function setSkuType($skuType)
    {
        $this->skuType = $skuType;
        return $this;
    }
    
    /**
     * @return the $skuId
     */
    public function getSkuId()
    {
        return $this->skuId;
    }
    
    /**
     * @param number $skuId
     */
    public function setSkuId($skuId)
    {
        $this->skuId = $skuId;
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
        return $this;
    }
    
    /**
     * @return the $deliveryDate
     */
    public function getDeliveryDate()
    {
        return $this->deliveryDate;
    }
    
    /**
     * @param DateTime $deliveryDate
     */
    public function setDeliveryDate($deliveryDate)
    {
        $this->deliveryDate =  $deliveryDate;
        return $this;
    }
    
    /**
     * @return the $debtorName
     */
    public function getDebtorName()
    {
        return $this->debtorName;
    }
    
    /**
     * @param string $debtorName
     */
    public function setDebtorName($debtorName)
    {
        $this->debtorName = $debtorName;
        return $this;
    }
    
    /**
     * @return the $delAddress
     */
    public function getDelAddress()
    {
        return $this->delAddress;
    }
    
    /**
     * @param string $delAddress
     */
    public function setDelAddress($delAddress)
    {
        $this->delAddress = $delAddress;
        return $this;
    }
    
    /**
     * @return the $delPostcode
     */
    public function getDelPostcode()
    {
        return $this->delPostcode;
    }
    
    /**
     * @param string $delPostcode
     */
    public function setDelPostcode($delPostcode)
    {
        $this->delPostcode = $delPostcode;
        return $this;
    }
    
    /**
     * @return the $delCity
     */
    public function getDelCity()
    {
        return $this->delCity;
    }
    
    /**
     * @param string $delCity
     */
    public function setDelCity($delCity)
    {
        $this->delCity = $delCity;
        return $this;
    }
    
    /**
     * @return the $delCountryCode
     */
    public function getDelCountryCode()
    {
        return $this->delCountryCode;
    }
    
    /**
     * @param string $delCountryCode
     */
    public function setDelCountryCode($delCountryCode)
    {
        $this->delCountryCode = $delCountryCode;
        return $this;
    }
    
    /**
     * @return the $trackTraceCode
     */
    public function getTrackTraceCode()
    {
        return $this->trackTraceCode;
    }
    
    /**
     * @param string $trackTraceCode
     */
    public function setTrackTraceCode($trackTraceCode)
    {
        $this->trackTraceCode = $trackTraceCode;
        return $this;
    }
    
    /**
     * @return the $trackTraceUrl
     */
    public function getTrackTraceUrl()
    {
        return $this->trackTraceUrl;
    }
    
    /**
     * @param string $trackTraceUrl
     */
    public function setTrackTraceUrl($trackTraceUrl)
    {
        $this->trackTraceUrl = $trackTraceUrl;
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
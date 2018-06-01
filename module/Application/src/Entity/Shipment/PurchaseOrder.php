<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PurchaseOrder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", name="ORDERNR")
     *
     * @var integer
     */
    protected $ordernr;
    
    /**
     * @ORM\Column(type="string", name="SUPPLIERCODE")
     *
     * @var string
     */
    protected $suppliercode;
    
    /**
     * @ORM\Column(type="string", name="SUPPLIERNAME")
     *
     * @var string
     */
    protected $suppliername;
    
    /**
     * @ORM\Column(type="datetime", name="DELIVERYDATE")
     *
     * @var date
     */
    protected $deliverydate;
    
    /**
     * @ORM\Column(type="string", name="ORDERDESCRIPTION")
     *
     * @var string
     */
    protected $orderdescription;
    
    /**
     * @ORM\Column(type="string", name="ORDERREF")
     *
     * @var string
     */
    protected $orderref;

    /**
     * @return the $ordernr
     */
    public function getOrdernr()
    {
        return $this->ordernr;
    }
    
    /**
     * @param number $ordernr
     */
    public function setOrdernr($ordernr)
    {
        $this->ordernr = $ordernr;
        return $this;
    }
    
    /**
     * @return the $suppliercode
     */
    public function getSuppliercode()
    {
        return $this->suppliercode;
    }

    /**
     * @param string $suppliercode
     */
    public function setSuppliercode($suppliercode)
    {
        $this->suppliercode = $suppliercode;
        return $this;
    }

    /**
     * @return the $suppliername
     */
    public function getSuppliername()
    {
        return $this->suppliername;
    }

    /**
     * @param string $suppliername
     */
    public function setSuppliername($suppliername)
    {
        $this->suppliername = $suppliername;
        return $this;
    }

    /**
     * @return the $deliverydate
     */
    public function getDeliverydate()
    {
        return $this->deliverydate;
    }

    /**
     * @param \Application\Entity\Shipment\date $deliverydate
     */
    public function setDeliverydate($deliverydate)
    {
        $this->deliverydate = $deliverydate;
        return $this;
    }

    /**
     * @return the $orderdescription
     */
    public function getOrderdescription()
    {
        return $this->orderdescription;
    }

    /**
     * @param string $orderdescription
     */
    public function setOrderdescription($orderdescription)
    {
        $this->orderdescription = $orderdescription;
        return $this;
    }

    /**
     * @return the $orderref
     */
    public function getOrderref()
    {
        return $this->orderref;
    }

    /**
     * @param string $orderref
     */
    public function setOrderref($orderref)
    {
        $this->orderref = $orderref;
        return $this;
    }

}
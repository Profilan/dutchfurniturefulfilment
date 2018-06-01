<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PurchaseOrderline
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", name="ORDERLINEID")
     *
     * @var integer
     */
    protected $orderlineid;
    
    /**
     * @ORM\Column(type="string", name="ORDERNR")
     *
     * @var string
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
     * @ORM\Column(type="integer", name="QUANTITY")
     *
     * @var integer
     */
    protected $quantity;
    
    /**
     * @ORM\Column(type="datetime", name="DELIVERYDATE")
     *
     * @var date
     */
    protected $deliverydate;
    
    /**
     * @ORM\Column(type="string", name="ITEMCODE")
     *
     * @var string
     */
    protected $itemcode;
    
    /**
     * @ORM\Column(type="string", name="ITEMDESCRIPTION")
     *
     * @var string
     */
    protected $itemdescription;
    
    /**
     * @ORM\Column(type="string", name="SALESUNIT")
     *
     * @var string
     */
    protected $salesunit;
    
    /**
     * @ORM\Column(type="string", name="EANCODE")
     *
     * @var string
     */
    protected $eancode;
    
    /**
     * @ORM\Column(type="string", name="BRAND")
     *
     * @var string
     */
    protected $brand;
    
    /**
     * @ORM\Column(type="string", name="PRODUCTGROUP")
     *
     * @var string
     */
    protected $productgroup;
    
    /**
     * @ORM\Column(type="string", name="COLLIUNIT")
     *
     * @var string
     */
    protected $colliunit;
    
    /**
     * @ORM\Column(type="integer", name="SALESUNITPERCOLLI")
     *
     * @var integer
     */
    protected $salesunitpercolli;
    
    /**
     * @ORM\Column(type="decimal", name="VOLUME")
     *
     * @var decimal
     */
    protected $volume;
    
    /**
     * @ORM\Column(type="decimal", name="WEIGHT")
     *
     * @var decimal
     */
    protected $weight;
    
    /**
     * @ORM\Column(type="decimal", name="HEIGHT")
     *
     * @var decimal
     */
    protected $height;
    
    /**
     * @ORM\Column(type="decimal", name="LENGTH")
     *
     * @var decimal
     */
    protected $length;
    
    /**
     * @ORM\Column(type="decimal", name="WIDTH")
     *
     * @var decimal
     */
    protected $width;
    
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
     * @return the $orderlineid
     */
    public function getOrderlineid()
    {
        return $this->orderlineid;
    }

    /**
     * @param number $orderlineid
     */
    public function setOrderlineid($orderlineid)
    {
        $this->orderlineid = $orderlineid;
        return $this;
    }

    /**
     * @return the $ordernr
     */
    public function getOrdernr()
    {
        return $this->ordernr;
    }

    /**
     * @param string $ordernr
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
     * @return the $itemdescription
     */
    public function getItemdescription()
    {
        return $this->itemdescription;
    }

    /**
     * @param string $itemdescription
     */
    public function setItemdescription($itemdescription)
    {
        $this->itemdescription = $itemdescription;
        return $this;
    }

    /**
     * @return the $salesunit
     */
    public function getSalesunit()
    {
        return $this->salesunit;
    }

    /**
     * @param string $salesunit
     */
    public function setSalesunit($salesunit)
    {
        $this->salesunit = $salesunit;
        return $this;
    }

    /**
     * @return the $eancode
     */
    public function getEancode()
    {
        return $this->eancode;
    }

    /**
     * @param string $eancode
     */
    public function setEancode($eancode)
    {
        $this->eancode = $eancode;
        return $this;
    }

    /**
     * @return the $brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return the $productgroup
     */
    public function getProductgroup()
    {
        return $this->productgroup;
    }

    /**
     * @param string $productgroup
     */
    public function setProductgroup($productgroup)
    {
        $this->productgroup = $productgroup;
        return $this;
    }

    /**
     * @return the $colliunit
     */
    public function getColliunit()
    {
        return $this->colliunit;
    }

    /**
     * @param string $colliunit
     */
    public function setColliunit($colliunit)
    {
        $this->colliunit = $colliunit;
        return $this;
    }

    /**
     * @return the $salesunitpercolli
     */
    public function getSalesunitpercolli()
    {
        return $this->salesunitpercolli;
    }

    /**
     * @param number $salesunitpercolli
     */
    public function setSalesunitpercolli($salesunitpercolli)
    {
        $this->salesunitpercolli = $salesunitpercolli;
        return $this;
    }

    /**
     * @return the $volume
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * @param \Application\Entity\Shipment\decimal $volume
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * @return the $weight
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param \Application\Entity\Shipment\decimal $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return the $height
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param \Application\Entity\Shipment\decimal $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return the $length
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param \Application\Entity\Shipment\decimal $length
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return the $width
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param \Application\Entity\Shipment\decimal $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
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
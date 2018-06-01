<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Supplier
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", name="SUPPLIERCODE")
     *
     * @var integer
     */
    protected $suppliercode;
    
    /**
     * @ORM\Column(type="string", name="SUPPLIERNAME")
     *
     * @var string
     */
    protected $suppliername;
    
    /**
     * @return the $suppliercode
     */
    public function getSuppliercode()
    {
        return $this->suppliercode;
    }

    /**
     * @param number $suppliercode
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

    
    
}
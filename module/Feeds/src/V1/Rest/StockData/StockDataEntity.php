<?php
namespace Feeds\V1\Rest\StockData;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class StockDataEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", name="ITEMCODE")
     * 
     * @var string
     */
    protected $itemcode;
    
    /**
     * @ORM\Column(type="string", name="EAN")
     * 
     * @var string
     */
    protected $ean;
    
    /**
     * @ORM\Column(type="integer", name="STOCKLEVEL")
     * 
     * @var int
     */
    protected $stocklevel;
    
    /**
     * @ORM\Column(type="string", name="STATUS")
     * 
     * @var string
     */
    protected $status;
    
    /**
     * @ORM\Column(type="datetime", name="ATP")
     * 
     * @var date
     */
    protected $atp;
    
    /**
     * @ORM\Column(type="string", name="DFF_SHIPMENT")
     * 
     * @var string
     */
    protected $dffShipment;
    
    public function __construct()
    {
        
    }
    
    public function getArrayCopy()
    {
        return [
            'ITEMCODE' => $this->getItemcode(),
            'EAN' => $this->getEan(),
            'STOCKLEVEL' => $this->getStocklevel(),
            'STATUS' => $this->getStatus(),
            'ATP' => $this->getAtp(),
            'DFF_SHIPMENT' => $this->getDffShipment(),
        ];
    }
    
    public function exchangeArray($data)
    {
        if (isset($data['ITEMCODE'])) {
            $this->setItemcode($data['ITEMCODE']);
        }
        if (isset($data['EAN'])) {
            $this->setEan($data['EAN']);
        }
        if (isset($data['STOCKLEVEL'])) {
            $this->setStocklevel($data['STOCKLEVEL']);
        }
        if (isset($data['STATUS'])) {
            $this->setStatus($data['STATUS']);
        }
        if (isset($data['ATP'])) {
            $this->setAtp($data['ATP']);
        }
        if (isset($data['DFF_SHIPMENT'])) {
            $this->setDffShipment($data['DFF_SHIPMENT']);
        }
    }
    /**
     * @return the $ean
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     */
    public function setEan($ean)
    {
        $this->ean = $ean;
    }

    /**
     * @return the $stocklevel
     */
    public function getStocklevel()
    {
        return $this->stocklevel;
    }

    /**
     * @param number $stocklevel
     */
    public function setStocklevel($stocklevel)
    {
        $this->stocklevel = $stocklevel;
    }

    /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return the $atp
     */
    public function getAtp()
    {
        return $this->atp;
    }

    /**
     * @param \Feeds\V1\Rest\StockData\date $atp
     */
    public function setAtp($atp)
    {
        $this->atp = $atp;
    }

    /**
     * @return the $dffShipment
     */
    public function getDffShipment()
    {
        return $this->dffShipment;
    }

    /**
     * @param string $dffShipment
     */
    public function setDffShipment($dffShipment)
    {
        $this->dffShipment = $dffShipment;
    }

    /**
     * @return the $itemcode
     */
    public function getItemcode()
    {
        return $this->itemcode;
    }
    
    /**
     * 
     * @param string $itemcode
     */
    public function setItemcode($itemcode)
    {
        $this->itemcode = $itemcode;
    }

    
    
}

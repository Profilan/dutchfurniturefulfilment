<?php
namespace Application\Entity\Shipment;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EEK_DISTRIBUTION_STATUS")
 * 
 */
class StatusCode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="Id")
     *
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="integer", name="Status")
     *
     * @var integer
     */
    protected $status;
    
    /**
     * @ORM\Column(type="string", name="TableName")
     *
     * @var string
     */
    protected $tableName;
    
    /**
     * @ORM\Column(type="string", name="Description")
     *
     * @var string
     */
    protected $description;
    
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
     * @return the $tableName
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param string $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
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

    
    
}
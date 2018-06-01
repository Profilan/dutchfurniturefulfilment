<?php
namespace Application\Log\Formatter;

use DateTime;
use Traversable;
use Zend\Log\Formatter\FormatterInterface;

class SqlsrvDb implements FormatterInterface
{
    /**
     * Format specifier for DateTime objects in event data (default: ISO 8601)
     *
     * @see http://php.net/manual/en/function.date.php
     * @var string
     */
    protected $dateTimeFormat = 'Y-m-d H:i:s';
    
    /**
     * Class constructor
     *
     * @see http://php.net/manual/en/function.date.php
     * @param null|string $dateTimeFormat Format specifier for DateTime objects in event data
     */
    public function __construct($dateTimeFormat = null)
    {
        if ($dateTimeFormat instanceof Traversable) {
            $dateTimeFormat = iterator_to_array($dateTimeFormat);
        }
        
        if (is_array($dateTimeFormat)) {
            $dateTimeFormat = isset($dateTimeFormat['dateTimeFormat']) ? $dateTimeFormat['dateTimeFormat'] : null;
        }
        
        if (null !== $dateTimeFormat) {
            $this->setDateTimeFormat($dateTimeFormat);
        }
    }
    
    /**
     * Formats data to be written by the writer.
     *
     * @param array $event event data
     * @return array
     */
    public function format($event)
    {
        $format = $this->getDateTimeFormat();
        array_walk_recursive($event, function (&$value) use ($format) {
            if ($value instanceof DateTime) {
                $value = $value->format($format);
            }
        });
            
            return $event;
    }
    
    /**
     * {@inheritDoc}
     */
    public function getDateTimeFormat()
    {
        return $this->dateTimeFormat;
    }
    
    /**
     * {@inheritDoc}
     */
    public function setDateTimeFormat($dateTimeFormat)
    {
        $this->dateTimeFormat = (string) $dateTimeFormat;
        return $this;
    }
}

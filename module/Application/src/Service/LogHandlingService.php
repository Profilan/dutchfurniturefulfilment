<?php
namespace Application\Service;

use Zend\Log\Logger;
use Zend\Log\Writer\Db;
use Application\Log\Formatter\SqlsrvDb;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\ServiceManager;

class LogHandlingService
{
    /**
     * 
     * @var Logger
     */
    protected $logger;
    
    protected $config;
    
    function __construct($config)
    {
        $this->config = $config;
        
        $dbconfig = array(
            'hostname'  => $config['api-logger']['hostname'],
            'port'      => $config['api-logger']['port'],
            'driver'    => $config['api-logger']['driver'],
            'database'  => $config['api-logger']['database'],
            'username'  => $config['api-logger']['username'],
            'password'  => $config['api-logger']['password'],
        );
        $db = new Adapter($dbconfig);
        
        $mapping = array(
            'timestamp'     => 'date',
            'priority'      => 'type',
            'message'       => 'event',
            'priorityName'  => 'error_type',
            'extra' => array(
              'url' => 'url',  
            ),
        );
        
        $formatter = new SqlsrvDb();
        $writer = new Db($db, 'EEK_API_LOG', $mapping);
        $writer->setFormatter($formatter);
        
        $logger = new Logger();
        $logger->addWriter($writer);
        
        $this->logger = $logger;
    }
    
    function log($message, $type = Logger::INFO, $extra = array())
    {
        $log = $this->config['api-logger']['servicename'] . ": " . $message;
        
        switch ($type) {
            case Logger::ERR:
                $this->logger->err($log, $extra);
                break;
            case Logger::WARN:
                $this->logger->warn($log, $extra);
                break;
            default:
                $this->logger->info($log, $extra);
                break;
        }
        
    }
}


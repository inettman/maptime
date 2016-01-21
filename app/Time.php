<?php

namespace App;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\AccessType;
use JMS\Serializer\Annotation\SerializedName;

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    dirname(__DIR__).'/vendor/jms/serializer/src'
);

class Time
{
    /**
     * @Type("DateTime<'Y-m-d H:i'>")
     * @AccessType("public_method")
     * @var DateTime 
     */
    private $time;
    
    /**
     * @Type("DateTime<'Y-m-d H:i'>")
     * @AccessType("public_method")
     * @var DateTime 
     */
    private $sunrise;
    
    /**
     * @Type("DateTime<'Y-m-d H:i'>")
     * @AccessType("public_method")
     * @var DateTime 
     */
    private $sunset;
    
    /**
     * @Type("string")
     * @AccessType("public_method")
     * @SerializedName("timezoneId")
     * @var string 
     */
    private $timezoneId;
    
    public function __construct()
    {
        $this->time = Date('Y-m-d H:i');
    }
    
    /**
     * 
     * @return DateTime
     */
    public function getTime()
    {
        return $this->time;
    }
    
    /**
     * 
     * @param DateTime $time
     * @return Time
     */
    public function setTime($time)
    {
        $this->time = $time;
        
        return $this;
    }
    
    /**
     * 
     * @return DateTime
     */
    public function getSunrise()
    {
        return $this->sunrise;
    }
    
    /**
     * 
     * @param DateTime $sunrise
     * @return Time
     */
    public function setSunrise($sunrise)
    {
        $this->sunrise = $sunrise;
        
        return $this;
    }
    
    /**
     * 
     * @return DateTime
     */
    public function getSunset()
    {
        return $this->sunset;
    }
    
    /**
     * 
     * @param DateTime $sunset
     * @return Time
     */
    public function setSunset($sunset)
    {
        $this->sunset = $sunset;
        
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getTimezoneId()
    {
        return $this->timezoneId;
    }
    
    /**
     * 
     * @param string $timezoneId
     * @return Time
     */
    public function setTimezoneId($timezoneId)
    {
        $this->timezoneId = $timezoneId;
        
        return $this;
    }
    
}

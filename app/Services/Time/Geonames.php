<?php

namespace App\Services\Time;

use App\Contracts\Time;
use GuzzleHttp\Client;
use JMS\Serializer\SerializerBuilder;

class Geonames implements Time
{
    /**
     *
     * @var Client 
     */
    private $httpClient;
    
    /**
     *
     * @var Serializer 
     */
    private $serializer;
    
    /**
     *
     * @var array 
     */
    private $geonamesLogins = ['inettman', 'inettman2'];

    const GEONAMES_HOST = 'http://ws.geonames.org/timezoneJSON';

    /**
     * 
     * @param Client $client
     */
    public function __construct(Client $httpClient) {
        $this->httpClient = $httpClient;
        $this->serializer = SerializerBuilder::create()->build();
    }
    
    /**
     * Get time data.
     *
     * @return mixed
     */
    public function getTimeByCoordinates($lat, $lng)
    {   
        foreach ($this->geonamesLogins as $row) {
            $options = [
                'query' => [
                    'lat' => $lat,
                    'lng' => $lng,
                    'username' => $row,
                    'style' => 'full'
                ]
            ];
            
            $geonamesBody = $this->httpClient->get(self::GEONAMES_HOST, $options)->getBody();
        
            $result = $this->serializer->deserialize($geonamesBody, 'App\Time', 'json');
            if (!empty($result->getTime())) {
                break;
            }
        }
        return $result;
    }

}

<?php

namespace Nasa\Imagery;

class Parameter {

    private $lat;
    private $lon;
    private $dim;
    private $date;
    private $cloudScore;
    private $apiKey;

    const REQUIREDS = array(
        'Lat',
        'Lon',
        'ApiKey'
    );

    const PARAMETER_LAT = 'Lat';
    const PARAMETER_LON = 'Lon';
    const PARAMETER_DIM = 'Dim';
    const PARAMETER_DATE = 'Date';
    const PARAMETER_CLOUD_SCORE = 'CloudScore';
    const PARAMETER_API_KEY = 'ApiKey';

    const PARAMETERS = array(
        'Lat',
        'Lon',
        'Dim',
        'Date',
        'CloudScore',
        'ApiKey'
    );

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param float $lat
     * @return Parameter
     */
    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    /**
     * @return float
     */
    public function getLon()
    {
        return $this->lon;
    }

    /**
     * @param float $lon
     * @return Parameter
     */
    public function setLon($lon)
    {
        $this->lon = $lon;
        return $this;
    }

    /**
     * @return float
     */
    public function getDim()
    {
        return $this->dim;
    }

    /**
     * @param float $dim
     * @return Parameter
     */
    public function setDim($dim)
    {
        $this->dim = $dim;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Parameter
     */
    public function setDate($date)
    {
        $this->date = $date->format('YYYY-MM-DD');
        return $this;
    }

    /**
     * @return boolean
     */
    public function getCloudScore()
    {
        return $this->cloudScore;
    }

    /**
     * @param boolean $cloudScore
     * @return Parameter
     */
    public function setCloudScore($cloudScore)
    {
        $this->cloudScore = $cloudScore;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return Parameter
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

}
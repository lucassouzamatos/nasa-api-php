<?php

namespace Nasa\Imagery;

use Nasa\Imagery\Validation\ParameterValidation;

class Request {

    private $parameter;
    private $url = 'https://api.nasa.gov/planetary/earth/imagery/?';

    private $response;
    private $resource;

    const PARAMETER_URL = array(
        Parameter::PARAMETER_LAT => 'lat',
        Parameter::PARAMETER_LON => 'lon',
        Parameter::PARAMETER_DIM => 'dim',
        Parameter::PARAMETER_DATE => 'date',
        Parameter::PARAMETER_CLOUD_SCORE => 'cloud_score',
        Parameter::PARAMETER_API_KEY => 'api_key'
    );

    /**
     * Request constructor.
     * @param Parameter $parameter
     */
    public function __construct(Parameter $parameter)
    {
        $this->parameter = $parameter;

        $this->setParameters();
        $this->setResponse();
    }

    private function setParameters() {
        foreach (Parameter::PARAMETERS as $parameter) {
            if ($this->parameter->{'get' . $parameter}()){
                $parameterUrl = self::PARAMETER_URL[$parameter];
                $valueParameter = $this->parameter->{'get' . $parameter}();

                $this->url .= $parameterUrl . '=' . $valueParameter . '&';
            }
        }
    }

    private function setResponse() {
        if (!$this->getErrors()){
            $cURL = curl_init($this->url);

            curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);

            $result = curl_exec($cURL);
            curl_close($cURL);

            $this->response = json_decode($result);

            $this->setResource();
        }
    }

    private function setResource() {
        $resource = new Resource();
        $resource
            ->setDataSet($this->response->resource->dataset)
            ->setPlanet($this->response->resource->planet);

        $this->resource = $resource;
    }

    /**
     * @return bool|\Exception
     */
    public function getErrors() {
        try {
            (new ParameterValidation($this->parameter))->isValide();
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return 0;
    }

    public function getResponse(){
        return $this->response;
    }

    public function getCloudScore() {
        return $this->response->cloud_score;
    }

    public function getDate() {
        return $this->response->date;
    }

    public function getId() {
        return $this->response->id;
    }

    /**
     * @return Resource
     */
    public function getResource() {
        return $this->resource;
    }

    public function getServiceVersion() {
        return $this->response->service_version;
    }

    public function getImageUrl() {
        return $this->response->url;
    }
}
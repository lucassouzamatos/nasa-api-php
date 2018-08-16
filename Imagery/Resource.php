<?php

namespace Nasa\Imagery;

class Resource {
    private $dataSet;
    private $planet;

    /**
     * @return mixed
     */
    public function getDataSet()
    {
        return $this->dataSet;
    }

    /**
     * @param mixed $dataSet
     * @return Resource
     */
    public function setDataSet($dataSet)
    {
        $this->dataSet = $dataSet;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlanet()
    {
        return $this->planet;
    }

    /**
     * @param mixed $planet
     * @return Resource
     */
    public function setPlanet($planet)
    {
        $this->planet = $planet;
        return $this;
    }

}
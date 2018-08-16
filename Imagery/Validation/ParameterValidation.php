<?php

namespace Nasa\Imagery\Validation;

use Nasa\Imagery\Parameter;

class ParameterValidation {

    private $parameter;

    /**
     * ParameterValidation constructor.
     * @param Parameter $parameter
     * @throws \Exception
     */
    public function __construct(Parameter $parameter) {
        $this->parameter = $parameter;
    }

    /**
     * @throws \Exception
     */
    public function isValide() {
        foreach (Parameter::REQUIREDS as $required) {
            if (!$this->parameter->{'get'.$required}()) {
                throw new \Exception("$required não pode ser nulo");
            }
        }

        return true;
    }

}
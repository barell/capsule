<?php

namespace Capsule\Request;

/**
 * Class Input
 * @package Capsule\Request
 */
class Input
{
    /**
     * @var string
     */
    private $resourceName;

    /**
     * @var array
     */
    private $parameters;

    /**
     * Input constructor.
     * @param string $resourceName
     * @param array $params
     */
    public function __construct($resourceName = '', $params = [])
    {
        $this->resourceName = $resourceName;
        $this->parameters = $params;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * @param $name
     * @return $this
     */
    public function setResourceName($name)
    {
        $this->resourceName = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResourceName()
    {
        return $this->resourceName;
    }

    /**
     * @return mixed
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $parameters
     * @return $this
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }
}

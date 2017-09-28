<?php

namespace Capsule\File\Xml;

use Capsule\File\IParser;
use Capsule\Request\Input;
use Capsule\Request\Output;
use Capsule\Scenario;

/**
 * Class Parser
 * @package Capsule\File\Xml
 */
class Parser implements IParser
{
    /**
     * @param $data
     * @return Scenario
     */
    public function parse($data)
    {
        $xml = new \SimpleXMLElement($data);
        $scenario = new Scenario();

        $scenario->setInput(new Input((string) $xml['name']));
        if (isset($xml->input) && isset($xml->input->parameter)) {
            $scenario->getInput()->setParameters(
                $this->extractParameters($xml->input->parameter)
            );
        }

        $scenario->setOutput(new Output());
        if (isset($xml->output)) {
            $scenario->getOutput()->setContent((string) $xml->output);
        }

        if (isset($xml->sources) && isset($xml->sources->source)) {
            foreach ($xml->sources->source as $source) {
                $parameters = [];
                if (isset($source->parameters) && isset($source->parameters->parameter)) {
                    $parameters = $this->extractParameters(
                        $source->parameters->parameter
                    );
                }
                $scenario->addSource(
                    (string) $source['name'],
                    (string) $source->output,
                    $parameters
                );
            }
        }

        return $scenario;
    }

    /**
     * @param $parameters
     * @return array
     */
    private function extractParameters($parameters)
    {
        $extracted = [];
        foreach ($parameters as $parameter) {
            $key = (string) $parameter['name'];
            $extracted[$key] = $this->cast((string) $parameter['type'], (string) $parameter);
        }

        return $extracted;
    }

    /**
     * @param $type
     * @param $value
     * @return int
     */
    private function cast($type, $value)
    {
        switch ($type) {
            case 'null':
                return null;
            case 'boolean':
            case 'bool':
                return (bool) $value;
            case 'integer':
            case 'int' :
                return (int) $value;
            case 'float':
            case 'double':
                return (float) $value;
            default:
                return $value;
        }
    }
}

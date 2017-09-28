<?php

namespace Capsule\File\Xml;

use Capsule\File\IGenerator;
use Capsule\Scenario;

/**
 * Class Generator
 * @package Capsule\File\Xml
 */
class Generator implements IGenerator
{
    /**
     * @param Scenario $scenario
     * @return string
     */
    public function generate(Scenario $scenario)
    {
        $xml = new \DOMDocument('1.0', 'utf-8');

        $xml->formatOutput = true;
        $xml->preserveWhiteSpace = true;

        $root = $xml->createElement('scenario');
        $root->setAttribute('name', $scenario->getInput()->getResourceName());
        $xml->appendChild($root);

        $input = $xml->createElement('input');
        $parameters = $xml->createElement('parameters');
        foreach ($scenario->getInput()->getParameters() as $key => $value) {
            $parameter = $xml->createElement('parameter');
            $parameter->setAttribute('name', $key);
            $parameter->setAttribute('type', gettype($value));
            $parameter->appendChild($xml->createTextNode($value));

            $parameters->appendChild($parameter);
        }

        $input->appendChild($parameters);

        $sources = $xml->createElement('sources');
        foreach ($scenario->getSources() as $source) {
            $sourceNode = $xml->createElement('source');
            $sourceNode->setAttribute('name', $source->getInput()->getResourceName());

            $parameters = $xml->createElement('parameters');
            foreach ($source->getInput()->getParameters() as $key => $value) {
                $parameter = $xml->createElement('parameter');
                $parameter->setAttribute('name', $key);
                $parameter->setAttribute('type', gettype($value));
                $parameter->appendChild($xml->createTextNode($value));

                $parameters->appendChild($parameter);
            }

            $output = $xml->createElement('output');
            $output->appendChild($xml->createCDATASection($source->getOutput()->getContent()));

            $sourceNode->appendChild($parameters);
            $sourceNode->appendChild($output);
            $sources->appendChild($sourceNode);
        }

        $output = $xml->createElement('output');
        $output->appendChild($xml->createCDATASection($scenario->getOutput()->getContent()));

        $root->appendChild($input);
        $root->appendChild($sources);
        $root->appendChild($output);

        return $xml->saveXML();
    }
}

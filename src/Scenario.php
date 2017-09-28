<?php

namespace Capsule;

use Capsule\Request\Input;
use Capsule\Request\Output;
use Capsule\Scenario\Source;

/**
 * Class Scenario
 * @package Capsule
 */
class Scenario
{
    /**
     * @var Input
     */
    private $input;

    /**
     * @var Output
     */
    private $output;

    /**
     * @var array
     */
    private $sources = [];

    /**
     * @param Input $input
     * @return $this
     */
    public function setInput(Input $input)
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @return Input
     */
    public function getInput()
    {
        return $this->input;
    }

    /**
     * @param Output $output
     * @return $this
     */
    public function setOutput(Output $output)
    {
        $this->output = $output;

        return $this;
    }

    /**
     * @return Output
     */
    public function getOutput()
    {
        return $this->output;
    }

    /**
     * @param $name
     * @param $content
     * @param array $params
     * @return $this
     */
    public function addSource($name, $content, $params = [])
    {
        $source = new Source();
        $input = new Input($name, $params);
        $output = new Output($content);

        $source->setInput($input);
        $source->setOutput($output);

        $this->sources[] = $source;

        return $this;
    }

    /**
     * @return Source[]
     */
    public function getSources()
    {
        return $this->sources;
    }
}

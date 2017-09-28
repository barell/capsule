<?php

namespace Capsule\Scenario;

use Capsule\Request\Input;
use Capsule\Request\Output;

/**
 * Class Source
 * @package Capsule\Scenario
 */
class Source
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
}

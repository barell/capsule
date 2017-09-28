<?php

namespace Capsule\Scenario;

use Capsule\File\Translator;
use Capsule\Request\Input;
use Capsule\Request\Output;
use Capsule\Scenario;

/**
 * Class Recorder
 * @package Capsule\Scenario
 */
class Recorder
{
    /**
     * @var IStorage
     */
    private $storage;

    /**
     * @var Translator
     */
    private $translator;

    /**
     * @var Scenario
     */
    private $scenario;

    /**
     * @param IStorage $storage
     * @return $this
     */
    public function setStorage(IStorage $storage)
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * @return IStorage
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @param Translator $translator
     * @return $this
     */
    public function setTranslator(Translator $translator)
    {
        $this->translator = $translator;

        return $this;
    }

    /**
     * @return Translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @param $name
     * @param $content
     * @param array $params
     * @return $this
     */
    public function addSource($name, $content, $params = [])
    {
        $this->scenario->addSource($name, $content, $params);

        return $this;
    }

    /**
     * @param $name
     * @param array $params
     */
    public function open($name, $params = [])
    {
        $input = new Input();
        $input->setResourceName($name);
        $input->setParameters($params);

        $this->scenario = new Scenario();
        $this->scenario->setInput($input);
    }

    /**
     * @param $response
     */
    public function close($response)
    {
        $output = new Output($response);
        $this->scenario->setOutput($output);

        $content = $this->getTranslator()
                        ->getGenerator()
                        ->generate($this->scenario);

        $this->getStorage()->save(
            $this->scenario->getInput()->getResourceName(),
            $content
        );
    }

    /**
     * @param $name
     * @return Scenario
     */
    public function load($name)
    {
        $content = $this->getStorage()->load($name);

        $scenario = $this->getTranslator()->getParser()->parse($content);

        return $scenario;
    }
}

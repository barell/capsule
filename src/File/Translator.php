<?php

namespace Capsule\File;

/**
 * Class Translator
 * @package Capsule\File
 */
class Translator
{
    /**
     * @var IGenerator
     */
    private $generator;

    /**
     * @var IParser
     */
    private $parser;

    /**
     * @param IGenerator $generator
     * @return $this
     */
    public function setGenerator(IGenerator $generator)
    {
        $this->generator = $generator;

        return $this;
    }

    /**
     * @return IGenerator
     */
    public function getGenerator()
    {
        return $this->generator;
    }

    /**
     * @param IParser $parser
     * @return $this
     */
    public function setParser(IParser $parser)
    {
        $this->parser = $parser;

        return $this;
    }

    /**
     * @return IParser
     */
    public function getParser()
    {
        return $this->parser;
    }
}

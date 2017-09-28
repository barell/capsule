<?php

namespace Capsule\Request;

/**
 * Class Output
 * @package Capsule\Request
 */
class Output
{
    /**
     * @var string
     */
    private $content;

    /**
     * Output constructor.
     * @param null $content
     */
    public function __construct($content = null)
    {
        $this->content = $content;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}

<?php

namespace Capsule\Scenario\Storage;

use Capsule\Scenario\IStorage;

/**
 * Class FileStorage
 * @package Capsule\Scenario\Storage
 */
class FileStorage implements IStorage
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $extension;

    /**
     * @param $path
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $extension
     * @return $this
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param $name
     * @param $content
     */
    public function save($name, $content)
    {
        file_put_contents($this->buildPath($name), $content);
    }

    /**
     * @param $name
     * @return bool|string
     */
    public function load($name)
    {
        return file_get_contents($this->buildPath($name));
    }

    /**
     * @param $name
     * @return string
     */
    private function buildPath($name)
    {
        return rtrim($this->path, '/') . '/' . $name . '.' . $this->extension;
    }
}

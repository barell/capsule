<?php

namespace Capsule\Scenario;

/**
 * Interface IStorage
 * @package Capsule\Scenario
 */
interface IStorage
{
    /**
     * @param $name
     * @param $content
     */
    public function save($name, $content);

    /**
     * @param $name
     * @return mixed
     */
    public function load($name);
}

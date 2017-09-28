<?php

namespace Capsule\File;

use Capsule\Scenario;

/**
 * Interface IGenerator
 * @package Capsule\File
 */
interface IGenerator
{
    /**
     * @param Scenario $scenario
     * @return mixed
     */
    public function generate(Scenario $scenario);
}

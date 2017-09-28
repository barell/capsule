<?php

namespace Capsule\File;

/**
 * Interface IParser
 * @package Capsule\File
 */
interface IParser
{
    /**
     * @param $data
     * @return mixed
     */
    public function parse($data);
}

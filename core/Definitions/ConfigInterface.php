<?php 

namespace Core\Definitions;

/**
 * App Config Interface
 */
interface ConfigInterface 
{
    /**
     * get config option by key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key);
}
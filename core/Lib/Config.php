<?php

namespace Core\Lib;

use ArrayObject;
use Core\Definitions\ConfigInterface;

/**
 * Configration class
 */
class Config implements ConfigInterface
{
    /**
     * configration list registery
     *
     * @var array
     */
    protected $roles;

    /**
     * build new config class from given array of configrations
     *
     * @param array $rules
     */
    public function __construct(array $roles)
    {
        $this->roles = $roles;    
    }

    /**
     * get config option by key
     *
     * @param string $key
     * @param string|null $default
     * @return array|string|null
     */
    public function get($key, $default = null) {
        if($this->roles[$key] !== null) {
            return $this->roles[$key];
        }
        return $default;
    }
}
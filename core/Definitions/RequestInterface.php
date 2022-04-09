<?php 

namespace Core\Definitions;

interface RequestInterface 
{
    /**
     * get current request uri
     *
     * @return string
     */
    public function uri();

    /**
     * return request method e.g. post, get
     *
     * @return string
     */
    public function method();

    /**
     * get get request query string variables
     *
     * @return array
     */
    public function queryString();

    /**
     * get post request body arguments
     *
     * @return array
     */
    public function args();
}
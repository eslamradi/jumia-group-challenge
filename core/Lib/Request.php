<?php

namespace Core\Lib;

use Core\Definitions\RequestInterface;

/**
 * Http Request Class
 */
class Request implements RequestInterface
{
    /**
     * get current request uri
     *
     * @return string
     */
    public function uri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    /**
     * return request method e.g. post, get
     *
     * @return string
     */
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * get get request query string variables
     *
     * @return array
     */
    public function queryString()
    {
        return array_filter($_GET);
    }

    /**
     * get post request body arguments
     *
     * @return array
     */
    public function args() {
        return array_filter($_POST);
    }
}
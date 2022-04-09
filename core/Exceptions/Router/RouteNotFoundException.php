<?php 

namespace Core\Exceptions\Router;

use Exception;

/**
 * No match found for this URI against application router registery list
 */
class RouteNotFoundException extends Exception {}
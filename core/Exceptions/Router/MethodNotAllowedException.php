<?php 

namespace Core\Exceptions\Router;

use Exception;

/**
 * Request Method is not suppoerted for this URI
 */
class MethodNotAllowedException extends Exception {}
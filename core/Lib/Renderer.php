<?php 

namespace Core\Lib;

use Core\Definitions\RendererInterface;
use Core\Exceptions\Application\ViewNotFoundException;

/**
 * renderer class for loading views
 */
class Renderer implements RendererInterface
{
    /**
     * load view file
     *
     * @param string $viewName
     * @param array $data
     * @throws ViewNotFoundException
     * @return string
     */
    public function load($viewName, $data) {
        extract($data);
        $viewFIle = BASEDIR . "src/Views/{$viewName}.v.php";
        if (file_exists($viewFIle)) {
            require_once $viewFIle;
            return;
        } else {
            throw new ViewNotFoundException();
        }
    }
}
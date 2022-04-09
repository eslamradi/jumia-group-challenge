<?php 

namespace Core\Definitions;

/**
 * renderer interface for loading views
 */
interface RendererInterface 
{
    /**
     * load view file
     *
     * @param string $viewName
     * @param array $data
     * @throws ViewNotFoundException
     * @return string
     */
    public function load($viewName, $data);
}
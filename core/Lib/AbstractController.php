<?php

namespace Core\Lib;

use Core\Definitions\ConfigInterface;
use Core\Definitions\RendererInterface;
use Core\Lib\QueryBuilder;
use Core\Lib\Renderer;

/**
 * Base class for http controllers
 */
abstract class AbstractController {
    
    /**
     * database query builder
     *
     * @var QueryBuilder
     */
    protected $db;

    /**
     * renderer opject for handling views
     *
     * @var Renderer
     */
    protected $renderer;

    /**
     * app config
     *
     * @var Config
     */
    protected $config;
    /**
     * construct base http controller class
     *
     * @param QueryBuilder $db
     */
    public function __construct(QueryBuilder $db, RendererInterface $renderer, ConfigInterface $config){
        $this->db = $db;
        $this->renderer = $renderer;
        $this->config = $config;
    }
}
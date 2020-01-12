<?php

namespace App\Controllers;

use AltoRouter;

class Router extends Controller{

    /**
     * @var string
     */
    private $viewPath;

    /**
     * @var AltoRouter
     */
    private $router;

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
        $this->router = new AltoRouter();
    }

    public function get(string $url, string $view, ?string $name = null): self
    {
        $this->router->map('GET', $url, $view, $name);
        return $this;
    }

    public function run(): self
    {
        $match = $this->router->match();
        $view = $match['target'];
        ob_start();
        require($this->viewPath . DIRECTORY_SEPARATOR . $view . '.php');
        $content = ob_get_clean();

        require('../layouts/template.php');
        return $this;
    }

}
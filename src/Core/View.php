<?php

namespace App\Core;

class View
{

    /**
     * @var string
     */
    protected $view_file;

    /**
     * @var string
     */
    protected $view_title;

    /**
     * @var array
     */
    protected $view_data;

    public function __construct(string $view_file, string $view_title, ?array $view_data = null)
    {
        $this->view_file = $view_file;
        $this->view_title = $view_title;
        $this->view_data = $view_data;
    }

    /**
     * Render the view of the action called
     */
    public function render()
    {
        if(file_exists(VIEW . $this->view_file . '.php')){
            ob_start();
            require(VIEW . $this->view_file . '.php');
            $content = ob_get_clean();
            $title = $this->view_title;
            require(ROOT . 'layouts' . DIRECTORY_SEPARATOR . 'template.php');
        }
    }

}
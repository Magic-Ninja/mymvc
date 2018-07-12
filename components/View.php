<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 07.07.2018
 * Time: 21:33
 */

namespace components;
use Twig_Loader_Filesystem;
use Twig_Environment;

class View
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem(ROOT . '/views');
        $this->twig = new Twig_Environment($this->loader, [
            'cache' => false,
        ]);
    }

    public function render($filename, $data = null)
    {
        echo $this->twig->render($filename, $data);
    }


}
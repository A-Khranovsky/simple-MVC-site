<?php

namespace MVC\Controllers;

class Controller
{
    public $path, $router, $model;
    private $redis;

    public function __construct($path, $redis)
    {
        $this->redis = $redis;
        $this->path = $path;
        $this->router = Router::parse($path);
        $class = 'MVC\\Models\\' . ucfirst($this->router->model);
        $this->model = new $class();
        if ($this->router->id) {
            $this->model = $this->model->collection[$this->router->id];
        }
    }

    public function render()
    {
        $cache = $this->redis->get($this->path);
        if(!$cache) {
            $class = get_class($this->model);
            $buf = explode('\\', $class);
            $class = end($buf);
            $decorator = \MVC\Decorators\DecoratorFactory::create
            (
                $this->router->ext,
                $class,
                $this->model
            );
            $view = \MVC\Views\ViewFactory::create($this->router->ext, $class, $decorator, $this->router->page - 1);
            $cache  = $view->render();
            $this->redis->set($this->path, $cache);
        }
        return $cache;
    }
}

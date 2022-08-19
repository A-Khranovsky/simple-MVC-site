<?php

namespace MVC\Controllers;

class Router
{
    public $model, $ext, $id;

    public static function parse($path)
    {
        $path = explode('/', $path);
        list($path, $ext) = explode('.', end($path)); //handling only the end from the last slash
        $arr = explode('/', $path);
        return new self($arr[0], $ext, count($arr) > 1 ? $arr[1] : null);
    }

    private function __construct($model, $ext = null, $id = null)
    {
        $this->model = $model;
        $this->ext = $ext;
        $this->id = $id;
    }
}

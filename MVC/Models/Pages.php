<?php

namespace MVC\Models;

class Pages implements \Iterator
{
    public $collection;
    private $index;

    public function __construct($pages = null)
    {
        if ($pages == null) {
            $pages = [

                new Page('Title1', 'Content1'),
                new Page('Title2', 'Content2'),
                new Page('Title3', 'Content3')
            ];
        }
        $this->collection = $pages;
    }

    public function current()
    {
        return $this->collection[$this->key()];
    }

    public function next()
    {
        ++$this->index;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->collection[$this->index]);
    }

    public function rewind()
    {
        $this->index = 0;
    }
}

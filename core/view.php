<?php
namespace core;
class view
{
    protected $file;
    protected $vals = [];

    public function make($file)
    {
        $this->file = 'view/' . $file . '.html';
        return $this;
    }


    public function with($name, $value)
    {
        $this->vals[$name] = $value;
        return $this;
    }

    public function __toString()
    {
        extract($this->vals);
        include $this->file;
        return '';
    }
}

?>
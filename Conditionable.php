<?php
trait Conditionable
{
    public function when($condition, $callable)
    {
        if ($condition) {
            $callable($this, $condition);
        }
        return $this;
    }
    public function unless($condition, $callable)
    {
       return $this->when(!$condition, $callable);
    }
}

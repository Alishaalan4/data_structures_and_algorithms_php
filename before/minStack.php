<?php
class MinStack
{
    private $stack = [];
    private $minStack = [];

    function push($x)
    {
        $this->stack[] = $x;

        if (empty($this->minStack) || $x <= end($this->minStack)) {
            $this->minStack[] = $x;
        }
    }

    function pop()
    {
        $x = array_pop($this->stack);

        if ($x == end($this->minStack)) 
        {
            array_pop($this->minStack);
        }
        return $x;
    }

    function top()
    {
        return end($this->stack);
    }

    function getMin()
    {
        return end($this->minStack);
    }
}


class MaxStack
{
    private $stack = [];
    private $maxStack = [];

    function push($x)
    {
        $this->stack[] = $x;

        if (empty($this->maxStack) || $x  >= end($this->maxStack)) {
            $this->maxStack[] = $x;
        }
    }

    function pop()
    {
        $x = array_pop($this->stack);

        if ($x == end($this->maxStack)) {
            array_pop($this->maxStack);
        }
        return $x;
    }

    function top()
    {
        return end($this->stack);
    }

    function getMin()
    {
        return end($this->maxStack);
    }
}
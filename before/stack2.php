<?php 
class Node
{
    public $data;
    public $next = null;
    public function __construct($data)
    {
        $this->data = $data;
    }
}

class stack2
{
    public $top = null;
    public function push($data)
    {
        $data = new Node($data);
        $data->next = $this->top;
        $this->top = $data;
    }

    public function pop()
    {
        if ($this->top->data == null)
        {
            return false;
        }
        $data = $this->top->data;
        $this->top = $this->top->next;
        return $data;
    }

    public function peek()
    {
        return $this->top->data;
    }
    public function top()
    {
        return $this->top->data;
    }
    public function head()
    {
        return $this->top;
    }
    function isEmpty()
    {
        return $this->top == null ;
    }
    function display()
    {
        $current = $this->top;
        while ($current != null )
        {
            echo $current->data . " ";
            $current=$current->next;
        }
    }
    public function reverse()
    {
        $current = $this->top;
        $prev = null;
        $next = null;
        while($current != null)
        {
            // a:current b:next  b a .  a     b  .  a  b
            $next = $current->next;
            $current->next = $temp;
            $temp = $current;
            $current = $next;
        }
        $this->top = $prev;
    }
    public function middle()
    {
        $slow = $this->top;
        $fast = $this->top;
        while ($fast && $fast->next!=null)
        {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
    public function sort()
    {
        do
        {
            $swapped = false;
            $current=$this->top;
            while ($current->next  !== null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data = $current->next->data;
                    $current->next->data=$temp;
                    $swapped =true;
                }
                $current=$current->next;
            }
        }while($swapped);
    }
}



function findMiddleInEven($top)
{
    $slow = $top;
    $fast = $top;
    while ($fast && $fast->next->next != null)
    {
        $slow = $slow->next;
        $fast=  $fast->next->next;
    }
    return $slow->data;
}

$head = new stack2();
$head->push(1);
$head->push(2);
$head->push(3);
$head->push(4);
$head->push(5);
$head->push(6);
$head->push(7);
$head->push(8);
$head->push(9);


function isValid($string)
{
    $stack = new stack2();
    $map = 
    [
        ')'=>'(',
        ']'=>'[',
        '}'=>'{',
    ];

    foreach(str_split($string) as $ch)
    {
        if (isset($map[$ch]))
        {
            if($stack->isEmpty() || $stack->pop() != $map[$ch])
            {
                return false;
            }
        }
        else
        {
            $stack->push($ch);
        }
    }
    return $stack->isEmpty();
}

function isValid2($s)
{
    $stack = new SplStack();

    $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    foreach (str_split($s) as $ch)
    {
        // If it's a closing bracket
        if (isset($map[$ch]))
        {
            if ($stack->isEmpty() || $stack->pop() !== $map[$ch])
            {
                return false;
            }
        }
        else
        {
            // It's an opening bracket
            $stack->push($ch);
        }
    }
    return $stack->isEmpty();
}
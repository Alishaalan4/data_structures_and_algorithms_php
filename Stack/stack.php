<?php

class Node
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class stack
{
    public $top;
    public $size;
    public function __construct()
    {
        $this->top = null;
        $this->size = 0;
    }

    public function push($data)
    {
        $data = new Node($data);
        $data->next=$this->top;
        $this->top=$data;
        $this->size++;
    }
    public function pop()
    {
        if ($this->top ==null)
        {
            return ;
        }
        $data = $this->top->data;
        $this->top = $this->top->next;
        $this->size--;
        return $data;
    }
    public function peek()
    {
        if ($this->top == null)
        {
            return ;
        }
        return $this->top->data;
    }
    public function top()
    {
        if ($this->top == null)
        {
            return ;
        }
        return $this->top->data;
    }
    public function isEmpty()
    {
        return $this->size == 0;
    }
    public function reverse()
    {
        $current = $this->top;
        $prev = null;
        while ($current != null)
        {
            $next = $current->next;
            $current->next = $prev;
            $prev= $current;
            $current = $next;
        }
        $this->top=$prev;
    }
    public function middle()
    {
        $current = $this->top;
        $slow = $current;
        $fast= $current;
        while ($fast != null && $fast->next != null)
        {
            $slow= $slow->next;
            $fast= $fast->next->next;

        }
        return $slow;
    }
    public function sort()
    {
        do
        {
            $swapped = false;
            $current = $this->top;
            while( $current->next != null )
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data = $current->next->data;
                    $current->next->data = $temp;
                    $swapped = true;
                }
                $current = $current->next;
            }
        }while ($swapped);
    }
}

function isValid($s)
{
    $stack = new stack();
    $map = [
        "]"=> "[",
        "}"=> "{",
        ")"=> "("
    ];
    // foreach(str_split($s) as $ch)
    // {
    //     if(in_array($ch, ['(','{','[']))
    //     {
    //         $stack->push($ch);
    //     }
    //     else
    //     {
    //         if ($stack->isEmpty() || $stack->pop () != $map[$ch])
    //         {
    //             return false;
    //         }
    //     }
    // }
    // return $stack->isEmpty();

    foreach(str_split($s) as $ch)
    {
        if (isset($map[$ch]))
        {
            if ($stack->isEmpty() || $stack->pop() != $map[$ch])
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

function longestValidParentheses($s)
{
    $stack = [];
    $stack[] = -1;
    $maxLen = 0;
    $n = strlen($s);

    for ($i = 0; $i < $n; $i++)
    {
        if ($s[$i] === '(')
        {
            $stack[] = $i;
        }
        else
        {
            array_pop($stack);

            if (empty($stack))
            {
                $stack[] = $i;
            }
            else
            {
                $maxLen = max($maxLen, $i - end($stack));
            }
        }
    }

    return $maxLen;
}


// implement stack using array
class stackUsingArray
{
    public $stack=[];
    public function push($s)
    {
        array_push($this->stack,$s);
    }
    public function pop()
    {
        return array_pop($this->stack);
    }
    public function isEmpty()
    {
        return empty($this->stack);
    }
    public function display()
    {
        $n = count($this->stack);
        for ($i = $n-1; $i >= 0 ; $i--)
        {
            echo($this->stack[$i]);
        }
    }
}

function reverseStringWithStack($s)
{
    $stack = new stack();
    foreach(str_split($s) as $ch)
    {
        $stack->push($ch);
    }
    $reserve = '';
    while(!$stack->isEmpty())
    {
        $reserve .= $stack->pop();
    }
    return $reserve;
}

function findMinInStack($stack)
{

    $min = $stack->top();
    while(!$stack->isEmpty())  
    {
        if ($min > $stack->top())
        {
            $min = $stack->top();
        }
    } 
    return $min;
}

/*
class StackUsingQueue
{
    public $queue;
    public function __construct()
    {
        $this->queue = new SplQueue();
    }

    public function push($x)
    {
        $this->queue->enqueue($x);
        $size = $this->queue->count();
        for($i = 0; $i < $size -1; $i++)
        {
            $this->queue->enqueue($this->queue->dequeue());
        }
    }
    public function pop()
    {
        return $this->queue->dequeue();
    }
}
*/



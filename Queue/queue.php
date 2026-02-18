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

class Queue
{
    public $head;
    public $tail;
    public $size;
    public function __construct()
    {
        $this->head = null;
        $this->tail = null; 
        $this->size = 0;
    }
    public function enqueue($data)
    {
        $data = new Node($data);
        if($this->head === null)
        {
            $this->head=$this->tail = $data;
            
        }
        $this->tail->next=$data;
        $this->tail= $data;
        $this->size++;
    }
    public function dequeue()
    {
        if ($this->head === null)
        {
            return ;
        }
        if ($this->head=$this->tail)
        {
            $data = $this->head;
            $this->head = $this->tail = null;
            return $data;
        }
        $data = $this->head;
        $this->head=$this->head->next;
        $this->size--;
        return $data;
    }
    public function Head()
    {
        if ($this->head === null)
        {
            return ;
        }
        return $this->head;
    }
    public function tail()
    {
        if ($this->tail === null)
        {
            return ;
        }
        return $this->tail;
    }
}

function mergeTwoQueues($q1,$q2)
{
    $q3 = new Queue();
    while (!$q1->isEmpty() && !$q2->isEmpty())
    {
        $q3->enqueue($q1->dequeue());
        $q3->enqueue($q2->dequeue());
    }
    while(!$q1->isEmpty())
    {
        $q3->enqueue($q1->dequeue());
    }
    while(!$q2->isEmpty())
    {
        $q3->enqueue($q2->dequeue());
    }
    return $q3;
}

function mergeTwoQueuesByValues($q1,$q2)
{
    $q3 =  new Queue();
    while (!$q1->isEmpty() && !$q2->isEmpty())
    {
        if ($q1->dequeue() > $q2->dequeue())
        {
            $q3->enqueue($q2->dequeue());
        }
        else
        {
            $q3->enqueue($q1->dequeue());
        }
    }
    while(!$q1->isEmpty())
    {
        $q3->enqueue($q1->dequeue());
    }
    while(!$q2->isEmpty())
    {
        $q3->enqueue($q2->dequeue());
    }
    return $q3;
}

class QueueUsingStack
{
    public $stack1;
    public $stack2;
    public function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }
    public function enqueue($x)
    {
        $this->stack1->push($x);
    }
    public function dequeue()
    {
        if ($this->stack2->isEmpty())
        {
            while(!$this->stack1->isEmpty())
            {
                $this->stack2->push($this->stack1->pop());
            }
        }
        return $this->stack2->pop();
    }
    public function peek() {
        if ($this->stack2->isEmpty()) {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }
        return $this->stack2->top(); // NOT pop()
    }

    public function empty() {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }
} 




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
class queue2
{
    public $head;
    public $tail;
    public $size;
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size= 0;
    }
    public function enqueue($data)
    {
        $data = new Node($data);
        if ($this->head === null)
        {
            $this->head = $this->tail = $data;
        }
        else
        {
            $this->tail->next = $data;
            $this->tail =$data;
        }
        $this->size++;
    }
    public function dequeue()
    {
        $temp = null;
        if ($this->head === null)
        {
            return ;
        }
        else if ($this->head == $this->tail)
        {
            $temp = $this->head;
            $this->head=$this->head->next;
        }
        else
        {
            $temp = $this->head;
            $this->head = $this->head->next;
        }
        $this->size--;
        return $temp;
    }
    public function getHead()
    {
        return $this->head ? $this->head->data : '';
    }
    public function getTail()
    {
        return $this->tail ? $this->tail->data : '' ;
    }
    public function isEmpty()
    {
        return $this->head == null ;
    }
    public function getTop()
    {
        return $this->head ? $this->head->data : '' ;
    }
    public function display()
    {
        $current = $this->head;
        while ($current != null)
        {
            echo $current->data . " ";
            $current = $current->next;
        }
    }
    public function size()
    {
        return $this->size;
    }
    public function reverse()
    {
        $prev = null;
        $current=$this->head;
        while ($current != null)
        {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        $this->head= $prev;
    }
}


function mergeTwoQueue($q1 , $q2)
{
    $q3 = new SplQueue;
    while (!$q1->isEmpty()    &&   !$q2->isEmpty() )
    {
        if ($q1->data  > $q2->data)
        {
            $q3->enqueue($q1->dequeue());
        }
        else
        {
            $q3->enqueue($q2->dequeue());
        }
    }
    while (!$q1->isEmpty())
    {
        $q3->enqueue($q1->dequeue());
    }
        while (!$q2->isEmpty())
    {
        $q3->enqueue($q2->dequeue());
    }
    return $q3;
}
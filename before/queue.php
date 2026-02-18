<?php 
/*
  Exactly ✅ — that is the key interview rule.

    When a problem says “Implement Stack using Queue”, you cannot do any of these:
    
    Use arrays like $arr[] or array_pop(), array_shift() directly.
    
    Use pointers or nodes like Node or linked list manually.
    
    Access elements by index (like $queue[0]).
    
    You must only use the standard queue operations:
    
    Operation	Meaning
    enqueue(x)	Add element to back
    dequeue()	Remove element from front
    peek() / front() / bottom()	Look at front without removing
    isEmpty()	Check if empty
    size()	Number of elements
 */



class Node
{
    public $data;
    public $next =null;
    public function __construct($data)
    {
        $this->data = $data;
    } 
}

class Queue 
{
    private $head;
    private $tail;
    private $size;
    public function __construct()
    {
        $this->head = null;
        $this->tail = null;
        $this->size = 0;
    }
    // add to the end 
    public function enqueue($data)
    {
        $data = new Node($data);
        if($this->head == null)
        {
            $this->head=$this->tail = $data;
        }
        else
        {
            $this->tail->next=$data;
            $this->tail=$data;
        }
        $this->size++;
    }

    // remove head 
    public function dequeue()
    {
        $temp = $this->head->data;
        if ($this->head == null)
        {
            return ;
        }
        else if ($this->head == $this->tail)
        {
            $temp = $this->head->data;
            $this->head = $this->tail = null;
        }
        else
        {
            $temp = $this->head->data;
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
        return $this->tail ? $this->tail->data : '';
    }
    public function isEmpty()
    {
        return $this->head == null ;
    }
    public function display()
    {
        $current = $this->head;
        while ($current!= null)
        {
            echo $current->data ;
            $current=$current->next;
        }
    }
    public function size()
    {
        return $this->size;
    }
    public function reverse()
    {
        $prev = null;
        $current =$this->head;
        while ($current != null)
        {
         //  a : current , b:next
            $next = $current->next;
            $current->next = $prev;
            $prev= $current;
            $current= $next;
        }
        $this->head=$prev;
    }
}

// merge two queue together 
function merge ($q1,$q2)
{
    $q3 = new Queue();
    while( !(($q1)->isEmpty()) && (!($q2)->isEmpty )) 
    {
        // the first element of each queue
        $q3->enqueue($q1->dequeue());
        $q3->enqueue($q2->dequeue());
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

// merge by values
function mergeS($q1,$q2)
{
    $q3 = new Queue();
    while (!$q1->isEmpty() && !$q2->isEmpty())
    {
        if ($q1->peek() > $q2->peek())
        {
            $q3->enqueue($q2->dequeue());
        }
        else
        {
            $q3->enqueue($q1->dequeue());
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

// Reverse First K Elements of a Queue using a queue only 
function reverseK($q,$k)
{
    $stack = [];
    for ($i=0; $i < $k ; $i++) { 
        array_push($stack,$q->dequeue());
    }
    while (!empty($stack))
    {
        $q->enqueue(array_pop($stack));
    }
    $size = $q->size();
    for ($i=0; $i < $size - $k ; $i++) { 
        $q->enqueue($q->dequeue());
    }
    return $q;
}

$queue = new Queue();
$queue->enqueue(10);
$queue->enqueue(20);
$queue->enqueue(30);
$queue->enqueue(40);
$queue->display();
echo "\n";
var_dump(reverseK( $queue, 3));
$queue->display();

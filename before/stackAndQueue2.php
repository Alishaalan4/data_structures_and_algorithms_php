<?php
// queue using stack (2 stacks for queue)

class QueueUsingStack
{
    private $stack1;
    private $stack2;
    public function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    public function enqueue($data)
    {
        $this->stack1->push($data);
    }
    public function dequeue()
    {
        if($this->stack2->isEmpty())
        {
            while (!$this->stack1->isEmpty())
            {
                $this->stack2->push($this->stack1->pop());
            }
        }
    return $this->stack2->pop();
    }
    public function top()
    {
        return $this->stack2->top();
    }
    public function isEmpty()
    {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }
}


class stackUsingQueue
{
    private $queue;
    public function __construct()
    {
        $this->queue = new SplQueue();
    }

    public function push($data)
    {
        $this->queue->enqueue($data);
        $size = $this->queue->count();
        for ($i=0; $i <$size -1  ; $i++) 
        { 
            $this->queue->enqueue($this->queue->dequeue());
        }
    }
    public function pop()
    {
        return $this->queue->dequeue();
    }

    public function top()
    {
        return $this->queue->bottom();
    }
    public function isEmpty()
    {
        return $this->queue->isEmpty();
    }
}


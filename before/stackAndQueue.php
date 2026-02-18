<?

// queueu using 2 stack
class QueueUsingTwoStacks
{
    private $stack1;
    private $stack2;

    public function __construct()
    {
        $this->stack1 = new SplStack();
        $this->stack2 = new SplStack();
    }

    public function enqueue($item)
    {
        $this->stack1->push($item);
    }

    public function dequeue()
    {
        if ($this->stack2->isEmpty()) 
        {
            while (!$this->stack1->isEmpty()) {
                $this->stack2->push($this->stack1->pop());
            }
        }
        if ($this->stack2->isEmpty()) {
            throw new UnderflowException("Queue is empty");
        }
        return $this->stack2->pop();
    }
    
}




// stack using queue 
class StackUsingQueue
{
    private $queue;

    public function __construct()
    {
        $this->queue = new SplQueue();
    }

    public function push($item)
    {
        $this->queue->enqueue($item);
        $size = $this->queue->count();
        for ($i = 0; $i < $size - 1; $i++) 
        {
            // shuffle the queue
            $this->queue->enqueue($this->queue->dequeue());
        }
    }

    public function pop()
    {
        if ($this->queue->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        }
        return $this->queue->dequeue();
    }

    public function top()
    {
        if ($this->queue->isEmpty()) {
            throw new UnderflowException("Stack is empty");
        }
        return $this->queue->bottom();
    }

    public function isEmpty()
    {
        return $this->queue->isEmpty();
    }
}
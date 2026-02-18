<?php



// linked list 
/*
class Node
{
    public $data;
    public $next=null;
    public function __construct($data)
    {
        $this->data = $data;
    }
}

class LinkedList
{
    public $head;
    public function __construct()
    {
        $this->head=null;
    }

    public function insert($data)
    {
        $data = new Node($data);
        $data->next= $this->head;
        $this->head = $data;
    }

    public function insertTail($data)
    {
        $data = new Node($data);
        $current = $this->head;
        while($current->next != null)
        {
            $current=$current->next;
        }
        $current->next=$data;
    }

    public function insertposition($data,$pos)
    {
        if ($pos==0)
        {
            $this->insert($data);
        }
        $current = $this->head;
        for ($i=0;$i<$pos;$i++)
        {
            $current=$current->next;
        }
        $data->next=$current->next;
        $current->next = $data;
    }
    public function deletebyvalue($value)
    {
        $current = $this->head;
        while ($current->next != null && $current->next->data != $value)
        {
            $current= $current->next;
        }
        if ($current->next)
        {
            $current->next=$current->next->next;
        }
    }

    public function reverse()
    {
        $prev = null;
        $current = $this->head;
        // a: $current b:$next
        while ($current != null)
        {
            $next = $current->next;
            $current->next = $prev;
            $prev=  $current;
            $current=$next;
        } 
        $this->head=$prev;
    }

    public function sort()
    {
        $current=$this->head;
        do
        {
            $swapped=false;
            while ($current != null)
            {
                if ($current->data > $current->next->data)
                {
                    $prev = $current->data;
                    $current->data = $current->next->data;
                    $current->next->data = $prev;
                    $swapped=true;
                }
                $current=$current->next;
            }
        }while($swapped);
    }




    public function insertatindex($data,$index)
    {
        $current = $this->head;
        for($i=0;$i<$index - 1  && $current ; $i++)
        {
            $current=$current->next;
        }
        $data->next = $current->next;
        $current->next=$data;
    }
    public function deleteatpos($pos)
    {
        $current=$this->head;
        for ($i=0;$i<$pos -1 && $current ; $i++)
        {
            $current=$current->next;
        }
        if ($current->next)
        {
            $current->next = $current->next->next;
        }
    }
}
*/


class Node
{
    public $data;
    public $next=null;
    public function __construct($data)
    {
        $this->data=$data;
    }
}

class stack
{
    private $top=null;

    public function push($data)
    {
        $data = new Node($data);
        $data->next = $this->top;
        $this->top = $data;
    }

    public function pop()
    {
        $data = $this->top->next;
        $this->top = $this->top->next;
        return $data;
    }

    public function peek()
    {
        return $this->top->data;
    }
    public function isEmpty()
    {
        return $this->top->data == null;
    }
    public function reverse()
    {
        // a: $current, b:$next
        $current=$this->top;
        $prev = null;
        while ($current!=null)
        {
            $next = $current->next;
            $current->next=$prev;
            $prev= $current;
            $current = $next; 
            $current = $current->next;
        }
        $this->top = $prev;
    }

    public function middle ()
    {
        $current = $this->top;
        $slow=$current;
        $fast=$current;
        while ($fast!=null && $fast->next !=null )
        {
            $slow = $slow->next;
            $fast = $fast->next->next;  
        }
        return $slow->data;
    }
    public function sort()
    {
        $current = $this->top;
        do 
        {
            $swapped=false;
            while ($current!=null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data = $current->next->data;
                    $current->next->data = $temp;
                    $swapped=true;
                    $current=$current->next;
                }
            }
        }while ($swapped);
    }

}







function isValid($s)
{
    $stack = new stack();
    $map =[
        ')' => '(',
        '}' => '{',
        ']' => '[',
    ];
    foreach(str_split($s)as $ch)
    {
        if (in_array($ch , ['(','{','[']))
        {
            $stack->push($ch);
        }
        else
        {
            if ($stack->isEmpty() || $stack->pop() !== $map[$ch])
            {
                return false;
            }
        }
    }
    return $stack->isEmpty();
    
}



/*
Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique element appears only once. The relative order of the elements should be kept the same.

Consider the number of unique elements in nums to be k​​​​​​​​​​​​​​. After removing duplicates, return the number of unique elements k.

The first k elements of nums should contain the unique numbers in sorted order. The remaining elements beyond index k - 1 can be ignored.
*/
function removeDuplicates(&$nums)
{
    $n = count($nums);
    if ($n==0) return 0;
    $j=0;
    for ($i=1;$i<$n;$i++)
    {
        if ($nums[$i] != $nums[$j])
        {
            $j++;
            $nums[$j]=$nums[$i];
        }
    }
    return $j + 1;
}




function findtarget($array,$value)
{
    $low = 0 ;
    $high= count($array) - 1;
    while ($low <= $high)
    {
        $mid = (int)(($high + $low ) /2);
        if ($mid == $value)
        {
            return $array[$mid];
        }
        if ($array[$mid] < $value)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
    return false;
}

// find first occurance of element in sorted array
function firstoccurance($array,$value)
{
    $low = 0 ;
    $high= count($array) - 1;
    $result = -1;
    while ($low <= $high)
    {
        $mid = (int)(($high + $low ) /2);
        if ($array[$mid] == $value)
        {
            $result = $mid;
            $high = $mid -1;
        }
        else if ($array[$mid] < $value)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
    return $result;
}

function lastoccurance($array,$target)
{
    $high = count ($array) - 1;
    $low = 0 ;
    $result = -1;
    while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($array[$mid] == $target)
        {
            $result = $mid;
            $low = $mid +1;
        }
        else if ($array[$mid] < $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1 ;
        }
        return $result;
    }
}


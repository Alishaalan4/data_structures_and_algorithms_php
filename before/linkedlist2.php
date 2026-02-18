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

class linkedlist
{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }
    public function insert($data)
    {
        $data = new Node($data);
        if ($this->head == null)
        {
            $this->head=$data;
        }
        else
        {
            $current = $this->head;
            while($current->next != null)
            {
                $current=$current->next;
            }
            $current->next = $data;
        }
    }

    public function remove ($data)
    {
        if ($this->head->val === $data)
        {
            $this->head=$this->head->next;
        }
        $current = $this->head;
        while ($current && $current->next->val != $data )
        {
            $current=$current->next;
        }
        if ($current->next)
        {
            $current->next = $current->next->next;
        }
    }

    public function display()
    {
        $current= $this->head;
        while ($current->next != null)
        {
            echo $current->data . " ";
            $current=$current->next;
        }
    }

    public function findByValue($target)
    {
        $current = $this->head;
        $counter = 0;
        if ($current == $target)
        {
            return $current;
        }
        else
        {
            while ($current->next != null)
            {
                if ($current->data === $target)
                {
                    $counter++;
                    return $current->data;
                }
                $current=$current->next;
            }
        }
        return -1;
    }
    public function count()
    {
        $current = $this->head;
        $counter = 0;
        while ($current != null)
        {
            $counter++;
            $current=$current->next;
        }
        return $counter;
    }
    public function sort()
    {
        do
        {
            $swapped=false;
            $current=$this->head;
            while ($current->next != null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data=$current->next->data;
                    $current->next->data = $temp;
                    $swapped=true;
                }
                $current=$current->next;
            }
        }while($swapped);
    }

    public function insertAthead($data)
    {
        $data = new Node($data);
        if ($this->head->data === null)
        {
            $this->head->data = $data;
        }
        $data->next = $this->head;
        $this->head=$data;
    }
    
    public function insertAtTail($data)
    {
        $data = new Node($data);
        $current=$this->head;
        while($current->next != null)
        {
            $current=$current->next;
        }
        $current->next = $data;
    }

        public function insertAtPosition($data,$pos)
        {
            $data = new Node($data);
            $current=$this->head;
            for($i=0;$i<$pos-1 && $current->next;$i++)
            {
                $current=$current->next;
            }
            $data->next = $current->next;
            $current->next=$data;
        }

    public function deleteAt($pos)
    {
        if ($pos == 0)
        {
            $this->head = $this->head->next;
            return ;
        }
        $current = $this->head;
        for($i=0;$i<$pos -1  && $current->next;$i++)
        {
            $current=$current->next;
        } 
        if ($current->next)
            {
                $current->next = $current->next->next;
            }
    }


    public function reverse()
    {
        $current = $this->head;
        $prev = null;
        while ($current)
            {
                // a : $current , b: $current->next 
                // b  a .. a , b .. a b
                $next=$current->next;
                $current->next = $prev;
                $prev = $current;
                $current = $next;      
            }
            $this->head = $prev;
    }

    // odd 
    public function findMiddle()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast && $fast->next)
            {
                $slow = $slow->next;
                $fast= $fast->next->next;
            }
            return $slow;
    }

    // even
    public function findMiddleFirst()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast && $fast->next->next)
            {
                $slow = $slow->next;
                $fast=$fast->next->next;
            }
            return $slow;
    }

}



// merge 2 list
function mergelists($list1 , $list2)
{
    $list3 = new Node(0);
    $tail = $list3;
    while ($list1!=null && $list2!=null)
        {
            if ($list1->val >= $list2->val)
            {
                $tail->next = $list1;
                $list1=$list1->next;
            }
            else 
            {
                $tail->next = $list2;
                $list2=$list2->next;
            }
            $tail=$tail->next;
        }
        if ($list1!=null)
            {
                $tail->next = $list1;
            }
        if ($list2!=null)
            {
                $tail->next = $list2;
            }
    return $list3->next;
}



function removeNthNodeFromEnd($head,$n)
{
    $dummy = new Node(0);
    $dummy->next=$head;

    $slow = $dummy;
    $fast = $dummy;
    for ($i=0; $i <$n ; $i++) 
    { 
        $fast=$fast->next;
    }
    while ($fast)
    {
        $slow = $slow->next;
        $fast=$fast->next;
    }
    $slow->next = $slow->next->next;
    return $dummy->next;
}




function getLen($list)
{
    $current = $list->head;
    $counter=0;
    while ($current!=null)
    {
        $counter++;
        $current=$current->next;
    }
    return $counter;
}

function MiddleInOdd($list)
{
    $slow = $list->head;
    $fast =  $list->head;
    while ($fast != null && $fast->next != null)
    {
        $slow = $slow->next;
        $fast=$fast->next->next;
    }
    return $slow;
}

function countData($list,$target)
{
    $current = $list->head;
    $counter = 0 ;
    while ($current != null)
    {
        if ($current->data == $target)
        {
            $counter++;
        }
        $current=$current->next;
    }
    return $counter;
}

function removeData($list,$target)
{
    $current= $list->head;
    if ($current->data == $target)
    {
        $list->head = $list->head->next;
    }
    while ($current != null && $current->next != null)
    {
        if ($current->next->data === $target)
        {
            $current->next=$current->next->next;
        }
        else
        {
            $current=$current->next;
        }
    }
}



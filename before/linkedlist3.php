<?php


class node
{
    public $data;
    public $next;
    public function __cunstruct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class linkedlist3
{
    public $head;
    public function __cunstruct()
    {
        $this->head = null;
    }

    public function insert($data)
    {
        $data = new node($data);
        if ($this->head === null)
        {
            $this->head = $data;
        }
        else
        {
            $current = $this->head;
            while ($current->next != null )
            {
                $current= $current->next;
            }
            $current->next = $data;
        }
        
    }
    public function remove($data)
    {
        if ($this->head->val === $data)
        {
            $this->head = $this->head->next;
        }
        else
        {
            $current=$this->head;
            while ($current->next && $current->next->val != $data)
            {
                $current=$current->next;
            }
            if ($current->next != null)
            {
                $current->next = $current->next->next;
            }
        }
    }

    public function valueFindindex($targt)
    {
        $current = $this->head;
        $counter = 0;
        while ($current != null)
        {
            if ($current->val === $targt)
            {
                return $counter;
            }
            $counter++;
            $current=$current->next;
        }
        return -1;
    }

    public function count_nums()
    {
        $current=$this->head;
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
            $current = $this->head;
            while ($current->next != null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data = $current->next->data;
                    $current->next->data=$temp;
                    $swapped=true;
                }
                $current=$current->next;
            }
        }while($swapped);
    }
    public function inserthead($data)
    {
        $data = new node($data);
        if ($this->head === null)
        {
            $this->head = $data;
        }
        else
        {
            $data->next = $this->head;
            $this->head = $data;
        }
    }
    public function inserttail($data)
    {
        $data = new node($data);
        $current = $this->head;
        while ($current->next!=null)
        {
            $current=$current->next;
        }
        $current->next = $data;
    }
    public function insertPos($data,$pos)
    {
        $data = new node($data);
        $current =$this->head;
        for($i=0;$i<$pos -1 && $current->next != null ;$i++)
        {
            $current= $current->next;
        }
        $data->next = $current->next;
        $current->next = $data;
    }

    public function delete_At_position($pos)
    {
        if ($pos == 0)
        {
            $this->head = $this->head->next;
            return;
        }
        $current=$this->head;
        for($i=0;$i<$pos-1 && $current->next!=null;$i++)
        {
            $current=$current->next;
        }
        if ($current->next!=null)
        {
            $current->next = $current->next->next;
        }
    }

    public function reverse()
    {
        $prev=null;
        $current=$this->head;
        while ($current->next != null)
        {
            
            $next=$current->next;
            $current->next=$temp;
            $temp = $current;
            $current=$next;
        }
        $this->head = $temp;
    }

    // find second middle
    public function midddddleeeeee()
    {
        $slow = $this->head;
        $fast=$this->head;
        while ($fast != null && $fast->next!= null)
        {
            $slow=$slow->next;
            $fast=$fast->next->next;
        }
        return $slow;
    }

    // first middle
    public function midle()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast != null && $fast->next->next != null)
        {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
    
}

function mrglst($l1,$l2)
{
    $l3 = new node(0);
    $tail = $l3;
    while ($l1 != null && $l2!=null)
    {
        if ($l1->data > $l2->data)
        {
            $tail->next = $l1;
            $l1=$l1->next;
        }
        else
        {
            $tail->next = $l2;
            $l2=$l2->next;
        }
        $tail=$tail->next;
    }
    if ($l1 != null)
    {
        $tail->next = $l1;
    }
    if ($l2 != null)
    {
        $tail->next = $l2;
    }
    return $l3->next;
}


function removenthnode($head,$n)
{
    $dummy = new node(0);
    $dummy->next=$head;

    $slow = $dummy;
    $fast=$dummy;
    for($i=0;$i<$n;$i++)
    {
        $fast=$fast->next;
    }
    while ($fast)
    {
        $slow=$slow->next;
        $fast=$fast->next;
    }
    $slow->next = $slow->next->next;
    return $dummy->next;
}
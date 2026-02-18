<?php

class Node
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
    }
}
class LL
{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }

    public function insert_at_head($data)
    {
        $data = new Node($data);
        $data->next = $this->head;
        $this->head=$data;
    }

    public function insert_at_tail($data)
    {
        $data = new Node($data);
        $current = $this->head;
        while ($current->next !=null)
        {
            $current = $current->next;
        }
        $current->next = $data;
    }

    public function insert_at_index($data, $index)
    {
        $data = new Node($data);
        if ($index == 0)
        {
            $data->next = $this->head;
            $this->head = $data;
            return;
        }
        $current = $this->head;
        if ($current == null)
        {
            return;
        }
        for ($i = 0; $i < $index - 1 && $current->next != null; $i++)
        {
            $current = $current->next;
        }
        $data->next = $current->next;
        $current->next = $data;
    }

    public function delete_by_value($value)
    {
        $current = $this->head;
        if ($value == $this->head->data)
        {
            $temp = $this->head->next;
            $this->head = $temp;
        }
        while ($current->next != null && $current->next->data != $value)
        {
            $current = $current->next;
        }
        if ($current->next !=null)
        {
            $current->next = $current->next->next;
        }
    }
    public function delete_occurance_of_value($value)
    {
        if($value == $this->head->data)
        {
            $this->head=$this->head->next;
        }
        $current = $this->head;
        while ($current->next !=null)
        {
            if ($current->next->data == $value)
            {
                $current->next = $current->next->next;
            }
            else
            {
                $current=$current->next;
            }
        }
    }
    public function delete_by_index($index)
    {
        if ($this->head == null || $index < 0)
        {
            return;
        }
        if ($index == 0)
        {
            $this->head = $this->head->next;
        }
        else
        {
            $current = $this->head;
            for ($i = 0; $i < $index-1 && $current->next!=null; $i++)
            {
                $current = $current->next;
            }
            if ($current->next != null)
            {
                $current->next = $current->next->next;
            }
        }
    }

    public function reverse()
    {
        $prev=null;
        $current = $this->head;
        while ($current->next != null)
        {
            $next = $current->next;
            $current->next = $prev;
            $prev=$current;
            $current = $next;
        }
        $this->head=$prev;
    }

    public function detect_cycle()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast!=null && $fast->next !=null)
        {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow == $fast)
            {
                return true;
            }
        }
        return false;
    }
    public function second_middle()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast!=null && $fast->next != null)
        {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }
    public function first_middle()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast!=null && $fast->next->next != null)
        {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }
        return $slow;
    }

    // count item found
    public function count_value($value)
    {
        $counter = 0;
        $current = $this->head;
        while ($current->next != null)
        {
            if ($current->data === $value)
            {
                $counter++;
            }
            $current = $current->next;
        }
        return $counter;
    }
    public function get_even_alone()
    {
        $current = $this->head;
        $even = new LL();
        $odd = new LL();
        while ($current  != null)
        {
            if ($current->data %2==0)
            {
                $even->insert_at_tail($current->data);
            }
            else if ($current->data %3== 0)
            {
                $odd->insert_at_head($current->data);
            }
            $current=$current->next;
        }
        return [$even,$odd]; // or i can return odd also
    }

    public function sort()
    {
        $current = $this->head;
        if ($current == null)
        {
            return ;
        }
        do
        {
            $swapped = false;
            while ($current->next != null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->next->data=$current->data;
                    $current->data=$temp;
                    $swapped = true;
                }
                $current = $current->next;
            }
        }while ($swapped);
    }


    public function removeNthFromEnd($n)
    {
        $dummy = new Node(0);
        $dummy->next = $this->head;
        $slow = $dummy;
        $fast = $dummy;

        for ($i = 0; $i < $n; $i++)
        {
            $fast=$fast->next;
        }
        while ($fast->next != null)
        {
            $slow = $slow->next;
            $fast = $fast->next;
        }
        $slow ->next = $slow ->next->next;
        return $dummy->next;
    }
    public function count_number_occurance($n)
    {
        $counter = 0;
        $current = $this->head;
        while ($current->next != null)
        {
            if ($current->data === $n)
            {
                $counter++;
            }
            $current = $current->next;
        }
        return $counter;
    }
}



// outside functions
    function mergeTwoLists($list1, $list2) 
    {
        $l3 = new Node(0);
        $tail = $l3;
        while ($list1!= null && $list2 !=null)
        {
            if ($list1->val <= $list2->val)
            {
                $tail->next = $list1;
                $list1 = $list1->next;
            }
            else
            {
                $tail->next = $list2;
                $list2 = $list2->next;
            }
            $tail = $tail->next;
        }
        if ($list1 != null)
        {
            $tail->next = $list1;
        }
        if ($list2 != null)
        {
            $tail->next=$list2;
        }

        return $l3->next;
    }



function reveseList($list)
{
    $current = $list;
    $prev = null;
    while($current != null)
    {
        $next = $current->next;
        $current->next = $prev;
        $prev= $current;
        $current = $next;
    }
    return $prev;
}
function findMiddle($list)
{
    $current = $list;
    $slow = $current;
    $fast=$current;
    while ($fast != null && $fast->next != null)
    {
        $slow=$slow->next;
        $fast = $fast->next->next;
    }
    return $slow;
}

function sort($list)
{
    $current = $list;
    do
    {
        $swapped = false;
        $current = $list;
        while ($current-> next != null)
        {
            if ($current->data > $current->next->data)
            {
                $temp = $current->data;
                $current->data = $current->next->data;
                $current->next->data = $temp;
                $swapped = true;
            }
        }
    }while ($swapped);
}

function countValues($list,$value)
{
    $current = $list;
    $counter = 0;
    while($current!=null)
    {
        if ($current->data === $value)
        {
            $counter++;
        }
        $current=$current->next;
    }
    return $counter;
}

function sortValues($list)
{
    $current=$list;
    do
    {
        $swapped = false;
        $current = $list;
        while($current->next != null)
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
    }while($swapped);
}


function insertAtHead($list,$data)
{
    $data = new Node($data);
    $data->next=$list;
    return $data;
}

function insertAtTail($list,$data)
{
    $data = new Node($data);
    $current = $list;
    while( $current->next != null )
    {
        $current=$current->next;
    }
    $current->next=$list;
}


function insertAtIndex($list,$data,$index)
{
    $data = new Node($data);
    $current= $list;
    if ($index == 0 )
    {
        $data->next=$list;
    }
    for($i=0; $i< $index-1 && $current->next != null; $i++)
    {
        $current=$current->next;
    }
    if ($current->next != null)
    {
        $data->next=$current->next;
        $current->next=$data;
    }
    return $list;
}


function deleteByValueAccurance($list,$value)
{

    if ($list->data === $value)
    {
        $list= $list->next;
    }
    $current=$list;
    while( $current->next != null )
    {
        if ($current->next->data === $value)
        {
            $current->next = $current->next->next;
        }
        else
        {
            $current=$current->next;
        }
    }
    return $list;
}

function deleteByIndex($list,$index)
{
    if ($index == 0)
    {
        $list= $list->next;
    }
    else
    {
        $current=$list->next;
        for ($i=0;$i<$index -1 && $current->next != null;$i++)
        {
            $current=$current->next;
        }
        if ($current->next != null)
        {
            $current->next = $current->next->next;  
        }
    }
    return $list;
}


// odd => 1 3 5 7 %2 != 0
function removeNthNode($list,$n)
{
    $dummy = new Node(0);
    $dummy->next = $list;
    $slow = $dummy;
    $fast=$dummy;
    for ($i= 0;$i<$n;$i++)
    {
        $fast=$fast->next;
    }
    while($fast->next != null)
    {
        $slow = $slow->next;
        $fast=$fast->next;
    }
    $slow->next = $slow->next->next;    
    return $dummy->next;
}


function mergelists($list1,$list2)
{
    $list3= new Node(0);
    $tail = $list3;
    while($list1 !=null && $list2 != null)
    {
        if ($list1->data  > $list2->data)
        {
            $tail->next = $list2;
            $list2=$list2->next;
        }
        else
        {
            $tail->next = $list2;
            $list1=$list1->next;
        }
        $tail=$tail->next;
    }
    if($list1 != null)
    {
        $tail->next = $list1;
    }
    if($list2 != null)
    {
        $tail->next = $list2;
    }
}
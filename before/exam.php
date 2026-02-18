<?php
require ('stack.php');
require ('queue.php');
//linked list  

// 1- reverse a linked list 
function reverse($head)
{
    $current = $head;
    $prev = null;
    $next = null;
    while ($current != null)
    {
        // a:current b: next 
        $next = $current->next;
        $current->next = $prev;
        $prev = $current;
        $current = $next;
    }
    return $prev;
}

// 2- the middle node 
function middlenode($head)
{
    $current = $head;
    $slow = $head;
    $fast = $head;
    // first middle
    //  while ($fast->next !== null && $fast->next->next !== null)
    // second middle
    while ($fast != null && $fast->next !=null)
    {
        $slow = $slow->next;
        $fast=$fast->next->next;
    }
    return $slow;
}

// 3- has cycle 
function hascycle($head)
{
    $slow = $head;
    $fast = $head;
    while ($fast && $fast->next != null)
    {
        $slow= $slow->next;
        $fast=$fast->next->next;
        if ($slow= $fast)
        {
            return true;
        }
    }
    return false;
}


// 4-remove duplicates
function removeduplicates($head)
{
    $current = $head;
    while ($current->next != null)
    {
        if ($current == $current->next->val)
        {
            $current->next = $current->next->next;
        }
        else
        {
            $current = $current->next;
        }
    }
    return $head;
}


// 5- delete by value 
function deleteValue($head,$target)
{
    $current= $head;
    while ($current->next != null && $current->next->val != $target)
    {
        $current=$current->next;
    }
    if ($current->next)
    {
        $current=$current->next->next;
    }
    return $head;
}

// 6- merge two sorted linked list
function merge2($l1,$l2)
{
    $dummy = new Node(0);
    $tail = $dummy;
    while ($l1 != null && $l2 != null)
    {
        if ($l1->val < $l2->val)
        {
            $tail->next = $l1->val;
            $l1=$l1->next;
        }
        else
        {
            $tail->next = $l2->val;
            $l2=$l2->next;
        }
        $tail = $tail->next;
    }
    if ($l1 !== null) $tail->next = $l1;
    if ($l2 !== null) $tail->next = $l2;

    return $dummy->next;
}

// 7- remove nth node from the end
function removenth($head,$n)
{
    $dummy = new Node(0);
    $dummy->next = $head;
    $first = $dummy;
    $second = $dummy;
    for ($i=0; $i <= $n; $i++)
    {
        $first = $first->next;
    }
    while ($first != null)
    {
        $first = $first->next;
        $second = $second->next;
    }
    $second->next = $second->next->next;
    return $dummy->next;
}

// 12- sort a linked list
function sortlist($head)
{
    do
    {
        $swapped = false;
        while ($head->next!=null)
        {
            if ($head->val < $head->next->val)
            {
                $temp = $head->val;
                $head->val = $head->next->val;
                $head->next->val = $temp;
                $swapped = true;
            }
            $head= $head->next;
        }
    }while($swapped);
}




// 8- palindrome linked list 
// 9- intersection of two linked lists
// 10 - rotate a linked list by k
// 11- reverse nodes in groops of k







// ====================================================================

// stack

// 1- implement a stack using array
$stack = [];
// push
array_push($stack,10);
array_push($stack,20);
array_push($stack,30);
array_push($stack,40);

// pop
$pop = array_pop($stack);
// peek
$peek = end($stack);
// empty
$empty = empty($stack);



// 2- reverse a string 
function reverseStringUsingStack($s)
{
    $stack = new Stack();
    foreach(str_split($s) as $ch)
    {
        $stack->push($ch);
    }
    $reserver = '';
    while (!$stack->isEmpty())
    {
        $reserver.= $stack->pop();
    }
    return $reserver;
}

// 3- valid parantheses
function isvalidparanth($s)
{
    $stack = new stackList();
    $map =
    [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];
    foreach(str_split($s) as $ch)
    {
        if (in_array($ch,['(','{','[']))
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


// var_dump(isvalidparanth('[]')); // true
// var_dump(isvalidparanth('([{}])')); // true
// var_dump(isvalidparanth('([)]')); // false


// 4- find minimum element is stack
function minimum($stack)
{
    $min = $stack->top;
    while (!$stack->isEmpty())
    {
        if ($stack->top < $min)
        {
            $min = $stack->top;
        }
        $stack->pop();
    }
    return $min;
}

// 5- implement stack using queue function 
class stackUsingQueue
{
    private $queue = [];
    public function push($x)
    {
        array_push($this->queue,$x);
        $size = count($this->queue);
        for  ($i = 0 ; $i<$size -1 ; $i++)
        {
            // rotate
            array_push($this->queue, array_shift($this->queue));
        }
    }
    public function pop()
    {
        return array_shift($this->queue);
    }
    public function top()
    {
        return $this->queue[0];
    }
    public function isEmpty()
    {
        return empty($this->queue);
    }
}

// Sort a stack using another stack
function sortStack($stack)
{
    $tempStack = new Stack();
    while (!$stack->isEmpty())
    {
        $temp = $stack->pop();
        // while (!$tempStack->isEmpty() && $tempStack->top() > $temp)
        {
            $stack->push($tempStack->pop());
        }
        $tempStack->push($temp);
    }
    return $tempStack;
}

// Remove adjacent duplicates from string
function removeAdjacentDuplicates($s)
{
    $stack = new stackList();
    foreach (str_split($s) as $ch)
    {
        if (!$stack->isEmpty() && $stack->top() == $ch)
        {
            $stack->pop();
        }
        else
        {
            $stack->push($ch);
        }
    }
    $result = '';
    while (!$stack->isEmpty())
    {
        $result = $stack->pop() . $result;
    }
    return $result;
}

// =================================================================================

// Queue

// 1- implement queue using array
$queue = [];
// enqueue
$enqueue = array_push($queue,10);
array_push($queue,20);
array_push($queue,30);

// dequeue
$dequeue = array_pop($queue[0]);

// peek no func
$peek = $queue[0];

// empty
$isEmpty = empty($queue);
// size
$size= sizeof($queue);

// 2- queue using 2 stacks
class queueUsingStack
{
    private $stack1;
    private $stack2;

    public function __construct()
    {
        $this->stack1 = new stackList();
        $this->stack2 = new stackList();
    }

    public function enqueue($x)
    {
        $this->stack1->push($x);
    }

    public function dequeue()
    {
        if ($this->stack2->isEmpty())
        {
            while (!$this->stack1->isEmpty())
            {
                $this->stack2->push($this->stack1->pop());
            }
        }
        return $this->stack2->pop();
    }

    public function peek()
    {
        if ($this->stack2->isEmpty())
        {
            while (!$this->stack1->isEmpty())
            {
                $this->stack2->push($this->stack1->pop());
            }
        }
        return $this->stack2->top();
    }

    public function isEmpty()
    {
        return $this->stack1->isEmpty() && $this->stack2->isEmpty();
    }
}

//======================================================================

// hash tables

// 1- two sum
function twoSum($nums,$target)
{
    $map = [];
    for ($i=0;$i<count($nums);$i++)
    {
        $num =$nums[$i];
        $diff = $target - $num;
        if (isset($map[$diff]))
        {
            return [$map[$diff], $i];
        }
        else
        {
            $map[$num] = $i;
        }
    }
    return [];
}

// 2- array has duplicates
function duplicates($nums)
{
    $map = [];
    //for duplicates
    $duplicates = []; 
    for($i=0;$i<count($nums);$i++)
    {
        $val = $nums[$i];
        if(isset($map[$val]))
        {
            $map[$val]++;
            $duplicates[]= $val;
        }
        else
        {
            $map[$val]=1;
        }
    }
    // return $map;
    // return count of each duplicates
    return $duplicates;
    // return if yes or no only
    if (count($duplicate) >= 1)
    {
        return true;
    }
    return false;
}

// $nums = [1,2,2,2,3,4,4,4,5,5,6,6,7,8,9,10];
// print_r(duplicates($nums));



// 3- count occurrences of each number
function countnums($nums)
{
    $map = [];
    //for duplicates
    // $duplicate = []; 
    for($i=0;$i<count($nums);$i++)
    {
        $val = $nums[$i];
        if(isset($map[$val]))
        {
            $map[$val]++;
            // $duplicate[]= $val;
        }
        else
        {
            $map[$val]=1;
        }
    }
    return $map;
    // return $duplicate;
}
$input = [1,2,2,3,3,3,2,4,2,3,5];
print_r((countnums($input)));

// 4- first non-repeating character in a string
function firstNonRepeatingChar($s)
{
    $map = [];
    for ($i=0;$i<strlen($s);$i++)
    {
        $ch = $s[$i];
        if (isset($map[$ch]))
        {
            $map[$ch]++;
        }
        else
        {
            $map[$ch]=1;
        }
    }
    for ($i=0;$i<strlen($s);$i++)
    {
        $ch = $s[$i];
        if ($map[$ch] == 1)
        {
            return $i;
        }
    }
    return -1;
}


// 5- anagram
function angm($s1,$s2)
{
    if (strlen($s1) != strlen($s2))
    {
        return false;
    }
    $map=[];
    for($i=0;$i<strlen($s1);$i++)
    {
        $ch = $s1[$i];
        if(isset($map[$ch]))
        {
            $map[$ch]++;
        }
        else
        {
            $map[$ch] =1 ;
        }
    }

    for($i=0;$i<strlen($s2);$i++)
    {
        $ch = $s2[$i];
        $map[$ch]--;
    }
    return $map; 
}


// =====================================================================================

// array 

//1- reverse array
function reversing($num)
{
    $count = count ($num);
    $new = [];
    for ($i=$count-1 ; $i>=0 ; $i--)
    {
        array_push($new,$num[$i]);
    }
    return $new;
}


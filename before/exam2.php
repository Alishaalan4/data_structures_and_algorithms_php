<?php 
function swappair($head)
{
    $current = $head;
    $newhead = $head->next;
    $prev=null;
    while ($current!=null && $current->next != null)
    {
        $next=$current->next;
        $nextNext=$next->next;

        // swap
        $next->next = $current;
        $current->next = $nextNext;

        // connect previous pair
        if ($prev != null)
        {
            $prev->next = $next;
        }

        $prev = $current;
        $current=$nextNext;
    }
    return $newhead;
}

function swapPairs($head)
{
    if ($head == null || $head->next == null) {
        return $head;
    }

    $dummy = new Node(0);   // fake node before head
    $dummy->next = $head;
    $prev = $dummy;

    while ($prev->next != null && $prev->next->next != null) {
        $first = $prev->next;
        $second = $first->next;

        // Swapping
        $first->next = $second->next;
        $second->next = $first;
        $prev->next = $second;

        // Move to next pair
        $prev = $first;
    }

    return $dummy->next;
}





function removeWithValue($head,$x)
{
    $current=$head;
    while($current->next !=null)
    {
        if($current->next->val === $x)
        {
            $current->next=$current->next->next;
        }
        else
        {
            $current=$current->next;
        }
    }
    return $head;
}
function removeWithValueAnother($head,$x)
{
    $current=$head;
    while($current->next !=null && $current->next->val != $x)
    {
        $current=$current->next;
    }
    if($current->next)
    {
        $current->next=$current->next->next;
    }
    return $head;
}

// check identical for array 
function checkIdentical($l1,$l2)
{
    if (sizeof($l1) != sizeof($l2))
    {
        return false;
    }

    for ($i=0;$i<sizeof($l1);$i++)
    {
        if ($l1[$i] != $l2[$i])
        {
            return false;
        }
    }
    return true;
}

// check identical for linkedlist
function checkLinkedListsIdentical($l1,$l2)
{
    while ($l1 != null && $l2 != null)
    {
        if($l1->val != $l2->val)
        {
            return false;
        }
        $l1=$l1->next;
        $l2=$l2->next;
    }
    return $l1==null && $l2 == null;
}


// check if elements in array are found in array 2
function checkElements($arr1,$arr2)
{
    if (count($arr1) != count($arr2))
    {
        return false;
    }
    foreach($arr1 as $x)
    {
        if (!in_array($x,$arr2)) return false;
    }
        foreach($arr2 as $x)
    {
        if (!in_array($x,$arr1)) return false;
    }
    return true;
}


function cycleCount($head)
{
    $slow = $head;
    $fast = $head;
    while ($fast != null  && $fast->next != null)
    {
        $slow = $slow->next;
        $fast=$fast->next->next;
        if ($slow == $fast)
        {
            $count = 1;
            $fast=$fast->next;
            while ($fast != $slow)
            {
                $fast=$fast->next;
                $count++;
            }
        }
        return $count;
    }
    return 0;
}

// detect cyle
/*

    $slow = $head;
    $fast = $head;
    while ($fast != null && $fast->next != null)
    {
        $slow = $slow->next;           // 1 step
        $fast = $fast->next->next;    // 2 steps

        if ($slow == $fast) {
            // cycle found
            break;
        }
    }
*/

// count only 
/*
    $count = 1;
    $fast = $fast->next;

    while ($slow != $fast) {
        $fast = $fast->next;
        $count++;
    }
*/



// remove head
function deque($queue)
{
    $temp = null;
    if ($queue->top === null)
    {
        return ;
    }
    else if ($queue->top == $queue->tail)
    {
        $temp = $queue->top;
        $queue->top=$queue->tail = null;
    }
    else
    {
        $temp = $queue->top->data;
        $queue->top = $queue->top->next;
    }
    return $temp;
}




// hash table
// Isomorphic strings
function isIsomorphic($s,$t)
{
    if (strlen($s) != strlen($t))
    {
        return false;
    }
    $mapST = [];
    $mapTS = [];
    for ($i=0;$i<strlen($s);$i++)
    {
        $charS = $s[$i];
        $charT = $t[$i];

        if ((!isset($mapST[$charS]) && isset($mapTS[$charT])) ||
            (isset($mapST[$charS]) && !isset($mapTS[$charT])))
        {
            return false;
        }

        if (isset($mapST[$charS]) && $mapST[$charS] != $charT)
        {
            return false;
        }
        if (isset($mapTS[$charT]) && $mapTS[$charT] != $charS)
        {
            return false;
        }

        $mapST[$charS] = $charT;
        $mapTS[$charT] = $charS;
    }
    return true;
}

// Word pattern
function wordPattern($pattern,$s)
{
    $words = explode(" ",$s);
    if (strlen($pattern) != count($words))
    {
        return false;
    }
    $mapPW = [];
    $mapWP = [];
    for ($i=0;$i<strlen($pattern);$i++)
    {
        $charP = $pattern[$i];
        $wordW = $words[$i];

        if ((!isset($mapPW[$charP]) && isset($mapWP[$wordW])) ||
            (isset($mapPW[$charP]) && !isset($mapWP[$wordW])))
        {
            return false;
        }

        if (isset($mapPW[$charP]) && $mapPW[$charP] != $wordW)
        {
            return false;
        }
        if (isset($mapWP[$wordW]) && $mapWP[$wordW] != $charP)
        {
            return false;
        }

        $mapPW[$charP] = $wordW;
        $mapWP[$wordW] = $charP;
    }
    return true;
}

// Find all anagrams in a string
function findAnagrams($s,$p)
{
    $result = [];
    $lenP = strlen($p);
    $countP = array_count_values(str_split($p));

    for ($i=0;$i<=strlen($s)-$lenP;$i++)
    {
        $substr = substr($s,$i,$lenP);
        $countSubstr = array_count_values(str_split($substr));
        if ($countP == $countSubstr)
        {
            $result[] = $i;
        }
    }
    return $result;
}

// array 
// Find peak element

// string
// Remove duplicate letters/
// Reverse words in a string
function reverseWords($s)
{
    $words = explode(" ",trim($s));
    $reversedWords = array_reverse($words);
    return implode(" ",$reversedWords);
}


function reversestring($s)
{
    $size = strlen($s);
    $result = "";
    for ($i=$size-1;$i>=0;$i--)
    {
        $result .= $s[$i];
    }
    return $result;
}
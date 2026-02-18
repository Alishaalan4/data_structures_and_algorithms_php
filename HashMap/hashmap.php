<?php
$nums=[1,2,2,2,3,4,4,5,5,5,6,6,6,6,7,7];

function count_values($nums)
{
    $seen = [];
    foreach($nums as $num)
    {
        if (isset($seen[$num]))
        {
            $seen[$num]++;
        }
        else
        {
            $seen[$num] = 1;
        }
    }
    $max_counted= 0;
    $max_key= 0;
    foreach($seen as $key => $value)
    {
        if ($max_counted < $value)
        {
            $max_counted = $value;
            $max_key = $key;
        }
    }
    return [$max_key, $max_counted];
}

// print_r(count_values($nums));

function twoSum($nums,$target)
{
    $seen=[];
    // $count = count($nums);
    for ($i=0; $i < count($nums) ; $i++) 
    { 
        $solution = $target-$nums[$i];
        if (isset($seen[$solution]))
        {
            return [$seen[$solution], $i];
        }
        
        
            $seen[$nums[$i]] = 1;
        
    }
    return [];
}
$nums = [3,5,2,-4,8,11];
$target=7;
// print_r(twoSum($nums,$target));

function anagram($s1,$s2)
{
    if (strlen($s1) != strlen($s2))
    {
        return false;
    }
    $map = [];
    for ($i= 0; $i < strlen($s1); $i++)
    {
        $ch = $s1[$i];
        if (isset($map[$ch]))
        {
            $map[$ch] ++;
        }
        else
        {
            $map[$ch] = 1;
        }
    }
    for ($i= 0; $i < strlen($s2); $i++)
    {
        $ch = $s2[$i];
        if (!isset($map[$ch]))
        {
            return false;
        }
        $map[$ch] --;
    }
    return true;
}


// majority element 2 => majority element that appears more than count/2
function majorityElement2($nums)
{
    $count = count($nums);
    $morethan = floor($count /2);
    $seen = [];
    $res = [];
    foreach ($nums as $num)
    {
        if (isset($seen[$num]))
        {
            $seen[$num] ++;
        }
        else
        {
            $seen[$num] = 1;
        }
    }
    foreach ($seen as $key => $value)
    {
        if ($value > $morethan)
        {
            $res[] = $key;
        }
    }
    return $res;
}
$nums = [3, 3, 4, 2, 3];
// print_r(majorityElement2($nums));
function majorityElement3($nums)
{
    $count = count($nums);
    $morethan = floor($count /3);
    $seen = [];
    $res = [];
    foreach ($nums as $num)
    {
        if (isset($seen[$num]))
        {
            $seen[$num] ++;
        }
        else
        {
            $seen[$num] = 1;
        }
    }
    foreach ($seen as $key => $value)
    {
        if ($value > $morethan)
        {
            $res[] = $key;
        }
    }
    return $res;
}
$nums = [1, 2, 3, 2, 2, 1, 1];
// print_r(majorityElement3($nums)); 


// first non repeating
function nonRepeating($nums)
{
    $result= [];
    $seen = [];
    foreach ($nums as $num)
    {
        if (isset($seen[$num]))
        {
            $seen[$num] ++;
        }
        else
        {
            $seen[$num] = 1;
        }
    }
    foreach ($seen as $key => $value)
    {
        if ($value == 1)
        {
            $result []= $key;
            // return $key;
        }
    }
    return $result;
}
$nums = [1, 2, 3, 2, 2,4];
// print_r(nonRepeating($nums));

// return the duplicates in array
function countDuplicates($nums)
{
    $map = [];
    $duplicates = [];
    foreach($nums as $num)
    {
        if(isset($map[$num]))
        {
            if ($map[$num] == 1)
                {
                    $duplicates[]= $num;
                } 
            $map[$num]++;
        }
        else
        {
            $map[$num] = 1 ;
        }
    }
    return $duplicates;
}
$nums = [1,2,3,2,4,5,3,6,7,8,5,9,1];
//  print_r(countDuplicates($nums)); // Output: [2,3,5,1]



function lengthOfLongestSubstring($s)
{
    $map = [];
    $left = 0;
    $maxLen = 0;

    for ($i = 0; $i < strlen($s); $i++) {
        $ch = $s[$i];

        // if character seen AND inside current window
        if (isset($map[$ch]) && $map[$ch] >= $left) {
            $left = $map[$ch] + 1;
        }

        // store last index of character
        $map[$ch] = $i;

        // update max length
        $maxLen = max($maxLen, $i - $left + 1);
    }

    return $maxLen;
}


function removeDuplicatesArray($nums)
{
    $seen = [];
    $result = [];

    foreach ($nums as $num) {
        if (!in_array($num, $seen)) {
            $result[] = $num;  // add unique number
            $seen[] = $num;    // mark as seen
        }
    }

    return $result;
}

function removeDuplicate(&$nums)
{
    $seen = [];
    $i = 0;
    $count = count($nums);

    for ($j = 0; $j < $count; $j++) {
        if (!in_array($nums[$j], $seen)) 
        {
            $nums[$i] = $nums[$j];
            $i++;
            $seen[] = $nums[$j]; // mark as seen
        }
    }
    return $i;
}   



function returnDuplicates($nums)
{
    $map=[];
    $result=[];
    foreach ($nums as $num)
    {
        if (isset($map[$num]))
        {
            $map[$num]++;
        }
        else
        {
            $map[$num] = 1;
        }
    }

    foreach($map as $key => $value)
    {
        if ($value > 1)
        {
            $result[]=$key;
        }
    }
    return $result;
}


function sumsas($nums,$target)
{
    $map = [];
    for ($i=0; $i <count($nums) ; $i++)
    { 
        $num = $nums[$i];
        $solution = $target - $num;
        if (isset($map[$solution]))
        {
            return [$i,$map[$num]];
        }
        else
        {
            $map[$num] = 1;
        }
    }
    return [];
}
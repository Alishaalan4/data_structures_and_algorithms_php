<?php

function removeDuplicatesArray($nums)
{
    $seen = [];
    $result = [];

    foreach ($nums as $num) 
    {
        if (!in_array($num, $seen)) {
            $result[] = $num; 
            $seen[] = $num;    
        }
    }

    return $result;
}


// $nums = [1,1,1,1,1,2,2,2,2,2,4,4,4,3,3,3,3,3,3];
// print_r(removeDuplicatesArray($nums));


function swapByIndex($nums,$i,$j)
{
    $temp = $nums[$i];
    $nums[$i] = $nums[$j];
    $nums[$j] = $temp;
    return $nums;
}


function swapByValues($nums,$value1,$value2)
{
    $i = array_search($value1,$nums);
    $j= array_search($value2,$nums);
    if ($i && $j)
    {
        [$nums[$i] , $nums[$j] ] = [$nums[$j] , $nums[$i]];
    }
    return $nums;
}


// $nums= [1,2,3,4,5,6];
// $new_nums=swapByValues($nums,2,4);
// print_r($new_nums);


function sorting($nums)
{
    $count = count($nums);
    $temp = null;
    for($i = 0 ;$i < $count - 1 ; $i++)
    {
        for ($j=$i+1; $j <$count ; $j++) 
        { 
            if ($nums[$i]  > $nums[$j])
            {
                $temp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j] = $temp;
            }
        }
    }
    return $nums;
}

// $nums = [2,2,5,8,9,3,1,4,5];
// $new_nums_sorted = sorting($nums);
// print_r($new_nums_sorted);

function swapElementsAdjacent($nums)
{
    $count = count($nums);
    for ($i=0; $i <$count-1 ; $i+=2)
    { 
        [$nums[$i],$nums[$i+1]] = [$nums[$i+1] , $nums[$i]];
    }
    return $nums;
}

// $nums = [10,20,30,40,50,60];
// $new_nums_swapped = swapElementsAdjacent($nums);
// print_r($new_nums_swapped);

// function to string is found inside another string
function isStringFound($str,$subStr)
{
    $lenStr = strlen($str);
    $lenSubStr = strlen($subStr);

    for ($i=0; $i <= $lenStr - $lenSubStr ; $i++) 
    { 
        $j=0;
        while ($j < $lenSubStr && $str[$i+$j] == $subStr[$j]) 
        {
            $j++;
        }
        if ($j == $lenSubStr) 
        {
            return true;
        }
    }
    return false;
}

// build in funciton to check string found in another string
function isStringFoundBuiltIn($str,$subStr)
{
    return strpos($str,$subStr) !== false;
}

function reversearray($nums)
{
    $count= count($nums);
    $reversed_nums = [];
    for ($i=$count-1; $i >= 0 ; $i--) 
    { 
        array_push($reversed_nums,$nums[$i]);
    }
    return $reversed_nums;
}
// $nums = [1,2,3,4,5,6];
// $reversed_nums = reversearray($nums);
// print_r($reversed_nums);



function moveZeros($nums)
{
    $count = count($nums);
    $new =[];
    $zero_count= 0;
    for ($i=0; $i <$count ; $i++) 
    { 
        if ($nums[$i] !==0)
        {
            array_push($new,$nums[$i]);
        }
        else
        {
            $zero_count++;
        }
    }

    for ($i=0; $i <$zero_count ; $i++) 
    { 
        array_push($new,0);
    }
    return $new;
}

function zm($nums)
{
    $count = count($nums);
    $new = [];
    $counter = 0;
    for ($i= 0; $i < $count ; $i++)
    {
        if ($nums[$i] !== 0)
        {
            array_push($new,$nums[$i]);
        }
        else
        {
            $counter++;
        }
    }
    for ($i= 0; $i < $counter ; $i++)
    {
        array_push($new,0);
    }
    return $new;
}





// $nums = [0,0,0,0,0,1,2,3,4,5,6,0,0,0,0,5,5,5,5,5];
// $new_nums_zero = moveZeros($nums);
// print_r($new_nums_zero);

function mergetwoarraysbysorting($num1,$num2)
{
    // no build in function and no sorting function
    $merged = [];
    foreach ($num1 as $n1) 
    {
        array_push($merged,$n1);
    }
    foreach ($num2 as $n2) 
    {
        array_push($merged,$n2);
    }
    $sorted = sorting($merged);
    return $sorted;
}


// merge arrays
function arrays($arr,$arr2)
{
    $new_array = [];
    foreach ($arr as $num)
    {
        array_push($new_array,$num);
    }
    foreach ($arr2 as $n2)
    {
        array_push($new_array,$n2);
    }
    sort($new_array);
    return $new_array;
}
function removeDuplicatesarraywithhashmap($nums)
{
    $seen = [];
    $result = [];

    foreach ($nums as $num) 
    {
        if (!isset($seen[$num])) 
        {   
            $seen[$num] = true;      // mark as seen
            $result[] = $num;        // store in output
        }
    }
    return $result;
}

// $nums = [1,1,2,2,3,3,4,4,4,4,5,5,5];
// $new_nums_without_duplicates = removeDuplicatesarraywithhashmap($nums);
// print_r($new_nums_without_duplicates);


function anagram($s1,$s2)
{
    $map=[];
    if (strlen($s1)  !=  strlen($s2) )
    {
        return false;
    }
    for($i=0 ; $i<strlen($s1);$i++)
    {
        $ch = $s1[$i];
        if (isset($map[$ch]))
        {
            $map[$ch]++;
        }
        else
        {
            $map[$ch] =1;
        }
    }

    for ($j=0; $j <strlen($s2) ; $j++) 
    { 
        $ch=$s2[$j];
        if (!isset($map[$ch]))
        {
            return false;
        }
        $map[$ch]--;
    }
    return true;
}

// var_dump(anagram('rat','tar'));



function count_duplicates($nums)
{
    $map = [];
    foreach($nums as $num)
    {
        if (isset($map[$num]))
        {
            $map[$num]++;
        }
        else
        {
            $map[$num]= 1;
        }
    }
    $maxNum = null;
    $maxCount = 0;

    foreach ($map as $num => $count) {
        if ($count > $maxCount) {
            $maxCount = $count;
            $maxNum = $num;
        }
    }

    return [$maxNum, $maxCount];
}
// $input = [1,2,2,3,3,3,2,4,2,3,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5];
// print_r(count_duplicates($input));


// twosum using hashmap
function twoSumUsingHashMap($nums,$target)
{
    $map = [];
    for ($i=0; $i <count($nums) ; $i++) 
    { 
        $num = $nums[$i];
        $diff = $target - $num;
        if (isset($map[$diff]))
        {
            return [$map[$diff] , $i];
        }
        $map[$num]=$i;
    }
    return [];
}



    function isValid($s)
    {
        $stack = new stack();
        $map = [
            ')'=>'(',
            '}'=>'{',
            ']'=>'[',
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
            return $stack->isEmpty();
        }
    }


function isValid2($s)
{
    $stack = new SplStack();

    $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    foreach (str_split($s) as $ch)
    {
        // If it's a closing bracket
        if (isset($map[$ch]))
        {
            if ($stack->isEmpty() || $stack->pop() !== $map[$ch])
            {
                return false;
            }
        }
        else
        {
            // It's an opening bracket
            $stack->push($ch);
        }
    }

    return $stack->isEmpty();
}
$testcase = "{()[]}";
var_dump(isValid2($testcase));

/*
    function IsValid($string)
    {
        $map = 
        [
        '}'=>'{',
        ')'=>'(',
        ']'=>']'
        ];

        foreach($string as $s)
        {
            if(isset($map[$ch]))
            {
                if ($stack->isEmpty() || $stack->pop()!== $map[$ch])
                {
                    return false;
                }
            }
            else
            {
                $stack->push($ch);
            }
        }
        return $stack->isEmpty();
    }


 */
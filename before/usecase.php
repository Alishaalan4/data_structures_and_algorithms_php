<?php 

//1- reverse array
function reversing($num)
{
    $count = count ($num);
    $new = [];
    for ($i=$count-1 ; $i >= 0 ; $i--)
    {
        array_push($new,$num[$i]);
    }
    return $new;
}
$nums = [-1,1,2,3,4,5,8];
// $reversed = reversing($nums);
// print_r( $reversed);

function minmax($nums)
{
    $min = $nums[0];
    $max = $nums[0];
    $count = count ($nums);
    for($i=0;$i<$count ;$i++)
    {
        if ($min > $nums[$i])
        {
            $min = $nums[$i];
        }
        if ($max < $nums[$i])
        {
            $max = $nums[$i];
        }
    }
    return [$min,$max];
}

// print_r(minmax($nums));


// move all zeros to the end 
function moveZeros($nums)
{
    $count = count ($nums);
    $new = [];
    $zeroCount = 0;
    for($i=0;$i<$count ;$i++)
    {
        if ($nums[$i] !== 0)
        {
            array_push($new,$nums[$i]);
        }
        else
        {
            $zeroCount++;
        }
    }
    for ($j=0;$j<$zeroCount;$j++)
    {
        array_push($new,0);
    }
    return $new;
}

function mergebotharrays($arr1,$arr2)
{
    $arr3=[];
    $count1 = count ($arr1);
    $count2 = count ($arr2);
    for($i=0;$i<$count1 ;$i++)
    {
        array_push($arr3,$arr1[$i]);
    }
    for($j=0;$j<$count2 ;$j++)
    {
        array_push($arr3,$arr2[$j]);
    }
    sort($arr3);
    return $arr3;
}

// remove duplicates without using hashmap
function removeduplicates($nums)
{
    $count = count ($nums);
    $new = [];
    for($i=0;$i<$count ;$i++)
    {
        if (!in_array($nums[$i],$new))
        {
            array_push($new,$nums[$i]);
        }
    }
    return $new;
}

function move($nums)
{
    $count = count($nums);
    $countzero = 0;
    $new = [];
    for ($i=0; $i < $count ; $i++) 
    { 
        if ($nums[$i] !== 0)
        {
            array_push($new,$nums[$i]);
        }
        else
        {
            $countzero++;
        }
    }
    for ($j=0;$j<$countzero;$j++)
    {
        array_push($new,0);
    }
    return $new;
}

$nums = [0,2,0,50,7,0,8,0,6,1,2,3,0,4,5,6,0,7,8,0,9,0];
// print_r(move($nums));

// return the duplicates 
function byHash($nums)
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

// print_r(byHash($nums));  


// remove duplicates from array using normal function
function dups($nums)
{
    $count = count ($nums);
    $new = [];
    for($i=0;$i<$count;$i++)
    {
        if (!in_array($new,$nums[$i]))
        {
            array_push($new,$nums[$i]);
        }
    }
    return $new;
}



// count vowels
function angrm($s1,$s2)
{
    $map=[];
    if(strlen($s1) != strlen($s2))
    {
        return false;
    }
    for($i=0 ; $i<strlen($s1);$i++)
    {
        $ch = $s1[$i];
        if(isset($map[$ch]))
        {
            $map[$ch]++;
        }
        else
        {
            $map[$ch]=1;
        }
    }
    for($i=0;$i<strlen($s2);$i++)
    {
        $ch = $s2[$i];
        if (!isset($map[$ch]))
        {
            return false;
        }
        $map[$ch]--;
    }
    // if all values inside $map ==0 => return true because it is anagram then
    foreach($map as $val)
    {
        if ($val != 0)
        {
            return false;
        }
    } 
    return true;
}

// test 
var_dump(angrm('rat','car'));


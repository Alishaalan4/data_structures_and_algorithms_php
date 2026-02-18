<?php

// sort array

$nums = [2,3,7,1,5,9,6,8,4,10,22,17,19,20];
function sortagain($nums)
{
    $count = count($nums);
    for($i=0;$i<$count - 1 ; $i++)
    {
        for($j=$i+1 ; $j < $count ; $j++)
        {
            if ($nums[$i]  > $nums[$j])
            {
                $temp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j]  = $temp;
            }
        }
    }
    return $nums;
}

$sorted= sortagain($nums);
// print_r($sorted);

// find middle element
function findMiddle($nums,$target)
{
    $low = 0 ;
    $high = count($nums) - 1;
    while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($nums[$mid] === $target)
        {
            return $mid; //index;
            // return $nums[$mid] => number 
            // return $nums[$mid] . $mid => number + index;
        }
        else if ($nums[$mid] < $target)
        {
            $low = $mid+1;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
}


    // first = > hi(gh = mid -1
function firsrtime($nums,$target)
{
    $low = 0;
    $high = count($nums) - 1;
    $result = -1; // in case not found
    while ($low <= $high)
    {
        $mid = (int)(($high + $low ) / 2);
        if ($nums[$mid] === $target )
        {
            $result = $mid ; // index of it
            $high = $mid - 1;
        }
        else if ($nums[$mid] < $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1;
        }
    }
    return $result;
}

// last => low = $mid +1 ;
function lastime($nums,$target)
{
    $low = 0;
    $high = count($nums) -1;
    $result = -1;
    while ($low <= $high)
    {
        $mid = (int)(($high + $mid ) / 2);
        if ($nums[$mid] === $target)
        {
            $result = $mid;
            $low = $mid  - 1;
        }
        else if ($nums[$mid] < $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1;
        }
    }
    return $result;
}

function minimumElement($nums)
{
    $low = 0;
    $high = count($nums) -1 ;
    while ($low < $high)
    {
        $mid = (int)(($high  +  $low ) /2);
        if ($nums[$mid] > $nums[$high])
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid;
        }
    } 
    return $nums[$low];
}

function minimum_index_possible_to_insert($nums,$target)
{
    $high = count($nums) - 1;
    $low = 0;
    while ($low < $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($nums[$mid] === $target)
        {
            return $mid;
        }
                else if ($nums[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
    return $low;
}

function max_insert_position($nums,$target)
{
    $high = count($nums) ;
    $low = 0;
    while ($low < $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($nums[$mid] <= $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid;
        }
    }
    return $low;
}

// maximum element using  binary search
function maxelement($array)
{
    $low = 0 ;  
    $high = count($array) - 1 ;
    while ($low < $high)
    {
        $mid = (int)(($high + $low ) /2 );
        // if array[4] > array [8] =>  8  >  10 
        if ($array[$mid] > $array[$high])
        {
            $low = $mid + 1 ;
        }
        else
        {
            $high = $mid;
        }
    }
    return $array[$high];
}



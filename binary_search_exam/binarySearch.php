<?php

// 1- binary search best case => o(1) : middle element 
// 2- binary search avergare => o(logn) : between and between 
// 3- array needs to be sorted before we make binary search
// $target > $arr[$mid] = > $low = $mid +1;


$nums = [2,8,1,3,5,9,10,15,11,16,12,17,14,18,16,13];
function sortingArray($arr)
{
    $count = count($arr);
    for($i=0;$i<$count-1;$i++)
    {
        for ($j=$i+1;$j<$count;$j++)
        {
            if ($arr[$i] > $arr[$j])
            {
                $temp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}
// print_r(sortingArray($nums));

// binary searching
function binary_search_algorithm($arr,$target)
{
    $low = 0;
    $count= count($arr)-1;
    $high = $count-1;
    while ($high<=$low)
    {
        $mid = (int)(($high+$low)/2);
        if ($arr[$mid] === $target)
        {
            // index 
            return $mid;
            // element => $arr[$mid]
        }
        else if ($arr[$mid] < $target) // 2 > 6
        {
            $low = $mid +1 ;
        }
        else
        {
            $high = $mid -1;
        }
    }
}
    // first apperance = > $high = $mid -1 
    function firstAppearElement($arr , $target)
    {
        $count = count($arr)-1 ;
        $low =0 ;
        $high = $count-1;
        $result = -1;
        while ($low<=$high)
        {
            $mid = (int)(($high+ $low)/2);
            if ($arr[$mid] === $target)
            {
                // possible first and possible not ;
                $result = $mid;
                $high= $mid -1;
            }
            else if ($arr[$mid] < $target)
            {
                $low = $mid +1 ; 
            }
            else
            {
                $high = $mid -1;
            }
        }
        return $result;
}
function lastAppearElement($arr , $target)
{
    $low = 0;
    $high = count($arr) -1 ;
    $result = -1 ;
    while ($low<=$high)
    {
        $mid = (int)(($high+ $low)/2);
        if ($arr[$mid] === $target)
        {
            $result = $mid;
            $low = $mid +1 ;
        }
        else if ($arr[$mid] < $target)
        {
            $low = $mid +1 ;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
    return $result;
}


// find minimum element
function find_minimum_element($arr)
{
    $low = 0;
    return $arr[$low];
}

function minimum_insert_position($arr, $target)
{
    $low = 0;
    $high = count($arr) -1;
    while ($low < $high)
    {
        $mid = (int)(($high+ $low)/2);
        if ($arr[$mid] === $target)
        {
            return $mid;
        }
        else if ($arr[$mid] < $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -11;
        }
    }
    return $low;
}

function max_insert_element($arr,$target)
{
    $low = 0;
    $high = count($arr) -1;
    while ($low < $high)
    {
        $mid = (int)(($high+ $low)/2);
        if ($arr[$mid]  <= $target)
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

    function twoSum($numbers, $target) 
    {
        sort($numbers);
        $count = count($numbers);

        for ($i = 0; $i < $count; $i++)
        {
            $solution = $target - $numbers[$i];

            $low = $i + 1;  
            $high = $count - 1;

            while ($low <= $high)
            {
                $mid = (int)(($low + $high) / 2);

                    if ($numbers[$mid] == $solution)
                    {
                        return [$numbers[$i], $numbers[$mid]];
                    }
                    elseif ($numbers[$mid] < $solution)
                    {
                        $low = $mid + 1;
                    }
                    else
                    {
                        $high = $mid - 1;
                    }
            }
        }

        return [];
    }

    function guess($num) 
    {
        global $pick; 
        if ($num == $pick) return 0;
        return ($num > $pick) ? -1 : 1;
    }
        function guessNumber($n) 
    {
        global $pick;
        $low = 1;
        $high = $n;
        while ($low <= $high)
        {
            $mid = (int)(($high + $low) /2);
            $result =guess($mid);
            if($result == 0)
            {
                return $mid;
            } 
            else if ($result == -1)
            {
                $high = $mid  - 1;
            }
            else
            {
                $low = $mid  + 1;
            }
        }
        return -1;
    }


function nextGreatestLetter($letters, $target) {
        $low = 0;
        $high = count($letters) - 1;
        while ($low <= $high) 
        {
            $mid = (int) (($low + $high) / 2);
            if ($letters[$mid] <=$target) 
            {
                $low = $mid  + 1;
            }
            else 
            {
                $high = $mid - 1;
            } 
                
        }
        return $letters[$low] ?? $letters[0];
}




// first => $high = $mid -1 ;
function binarySearchFirstAppeaerance($arr,$target)
{
    $low =0;
    $high = count($arr) -1 ;
    $result = -1;
    while ($low <= $high)
    {
        $mid = (int) (($low+$high)/2);
        if ($arr[$mid] === $target)
        {
            $result = $mid;
            $high = $mid -1 ;
        }
        else if ($arr[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid -1; 
        }
    }
    return $result;
}
function binarySearchLastAppeaerance($arr,$target)
{
    $low = 0;
    $high = count($arr) -1;
    $result = -1;
    while ($low <= $high)
    {
        $mid = (int) (($low+$high)/2);
        if ($arr[$mid] === $target)
        {
            $result = $mid;
            $low = $mid +1;
        }
        else if ($arr[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid - 1;
        }
    }
    return $result;
}

function minimumInsertPosition($arr,$target)
{
    $low = 0;
    $high = count($arr) -1;
    while ($low <= $high)
    {
        $mid = (int) (($low+$high)/2);
        if ($arr[$mid] === $target)
        {
            return $mid;
        }
        else if ($arr[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid -1;
        }
    }
    return $low;
}


function maxInsertElement($arr,$target)
{
    $low =0;
    $high = count($arr) -1;
    while ($low <= $high)
    {
        $mid = (int) (($low+$high)/2);
        if ($arr[$mid] <= $target)
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




function TwoSumBinarySearch($arr,$target)
{
    sort($arr);
    $count = count($arr);
    for ($i=0; $i < $count; $i++) 
    { 
        $solution = $target - $arr[$i];
        $low = $i+1;
        $high = $count -1 ;
        while ($low <= $high)
        {
            $mid = (int) (($low+$high)/2);
            if ($arr[$mid] === $solution)
            {
                // index
                return [$i,$mid]; 
                // return [$arr[$i],$arr[$mid]] =>numbers
            }
            else if ($arr[$mid] < $solution)
            {
                $low = $mid +1;
            }
            else
            {
                $high = $mid - 1;
            }
        }
    }
    return [];
}
<?php

// sorting array 
$nums = [52,16,8,12,7,10,11,9,2,3,5,1,17,14,22,26,28];
$count =  count($nums);
// o(n*2)
for ($i=0; $i < $count -1 ; $i++) 
{ 
    for($j=$i+1 ; $j<$count;$j++)
    {
        if ($nums[$i] >  $nums[$j])   
        {
            $temp = $nums[$i];
            $nums[$i] = $nums[$j];
            $nums[$j] = $temp;
        }
    }
}
// print_r($nums);


// find element


function binarysearch($nums,$target)
{
    $low = 0;
    $high = count($nums) -1 ;
    while ($low < $high)
    {
        $mid =  (int) (($high + $low ) /2);
        if ($nums[$mid] === $target)
        {
            return $mid . $nums[$mid]; 
        }
        else if($nums[$mid] < $target)
        {
            $low = $mid +1 ;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
}
// o(1) if element is in the middle 
function firstOccurance($array,$target)
{
    $low = 0;
    $high = count($array) -1 ;
    $result = -1;
    while ($low < $high)
    {
        $mid = (int) (($high + $low) /2); 
        if ($array[$mid] == $target)
        {
            $result = $mid;
            $high = $mid - 1;
        }
        else if ($array[$mid] < $target)
        {
            $low = $mid +1 ;
        }
        else 
        {
            $high = $mid - 1;
        }
    }
    return $result;
}


function lastOccurance($array , $target)
{
    $low = 0;
    $high = count($array) -1 ;
    $result = -1 ;
    while ($low < $high)
    {
        $mid = (int)(($high + $low) /2 );
        if ($array[$mid] == $target)
        {
            $result = $mid ;
            $low = $mid + 1 ;
        }
        else if ($array[$mid] < $target)
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

// minimum element 
function findMin($array)
{
    $low = 0;
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
    return $array[$low];
}


// function possible index to insert if now found 
function minindexinsert($nums , $target)
{
    $low = 0 ;
    $high = count($nums) - 1;
    while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($nums[$mid]  == $target )
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


function maxinsertpos($nums, $target)
{
    $low = 0;
    $high = count($nums);

    while ($low < $high) {
        $mid = (int)(($low + $high) / 2);

        if ($nums[$mid] <= $target) 
        {
            $low = $mid + 1;   
        } else {
            $high = $mid;
        }
    }

    return $low;   // maximum insert position
}


// add of 2 numbers to find target
function twosum($nums , $target)
{
    // should the first loop run to count -1  or count? 
    for($i=0;$i<count($nums); $i++)
    {
        for ($j=$i+1; $j <count($nums) -1 ; $j++) 
        { 
            if ($nums[$i] + $nums[$j] === $target)
            {
                return [$i,$j];
            }
        }
    }
    return [];
}
// if there is more than one sultion
function twosummoreelement($nums , $target)
{   
    $result = [];
    for($i=0;$i<count($nums) - 1; $i++)
    {
        for ($j=$i+1; $j <count($nums) ; $j++) 
        { 
            if ($nums[$i] + $nums[$j] === $target)
            {
                $double = [$i,$j];
                $result []= $double;
            }
        }
    }
    return $result;
}


// $nums = [1,2,5,9,5,-2];
// $target= 7;
// print_r(twosummoreelement($nums,$target));



// 3 sum for 0 
function threesumforzero($nums)
{
    $count =  count($nums);
    $res=[];
    for ($i=0; $i < $count -2 ; $i++) 
    { 
        for ($j = $i +1 ; $j < $count -1 ; $j++)
        {
            for ($k=$j+1; $k <$count ; $k++) 
            { 
                if ($nums[$i] + $nums[$j] + $nums[$k] === 0)
                {
                    $triplet = [$nums[$i] , $nums[$j] , $nums[$k]];
                    sort($triplet);
                    $res []= $triplet;
                }
            }
        }
    }
    return $res;
}
$nums = [0,1,1,-1,0,0,5,4,-9];
// print_r(threesumforzero($nums));



// string add +1 to it
function plusone($string)
{
    $num = implode('',$string);
    $add= bcadd($num,"1");
    $final = str_split($add);
    return $final;
}

function climbstars($n)
{
    if ($n == 1)
    {
        return 1;
    }
    if ($n ==2 )
    {
        return 2;
    }
    $a =1;
    $b=2;
    for ($i =3;$i < $n;$i++)
    {
        $c=$a+$b;
        $a=$b;
        $b=$c;
    }
    return $b;
}


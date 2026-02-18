<?php 
// search element in array 
// 1- sort array o(n)
// 2- binary search o(log n)

function sortnums($array)
{
    $count = count($array);
    for ($i=0; $i < $count-1 ; $i++) 
    { 
        for ($j=0 ; $j<$count-$i-1;$j++)
        {
            if ($array[$j] > $array[$j +1])
            {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1] = $temp;
            }
        }
    }
    return $array;
}
$nums = [1,8,2,5,3,6,4,7,10,15,19,12,18,17,20,19,50,30,32,39,26];
$test=[4, 3, 2, 1];

// sort in anotehr way 
function sortArray($array)
{
    $count = count($array);
    for ($i=0; $i < $count-1 ; $i++) 
    { 
        for ($j=$i+1 ; $j<$count;$j++)
        {
            if ($array[$i] > $array[$j])
            {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
            }
        }
    }
    return $array;
}

// binary search element directly 
function binsearch($array,$target)
{
    $low =0;
    $high = count($array)-1;
    while ($low <= $high)
    {
        $mid = (int)(($high+$low) /2);
        if ($array[$mid] === $target)
        {
            return $mid . $array[$mid];
        }
        else if ($array[$mid] < $target)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1;
        }
    }
    return false;
}

function findFLaccurance($array,$num)
{
    $low =0;
    $high = count($array) -1 ;
    $result=[-1,-1];
    while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($array[$mid] === $num)
        {
            $result[0]=$mid;
            $high = $mid -1;
        }
        else if ($array[$mid] < $num)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1;
        }
    }

    $low =0;
    $high = count($array)-1;
        while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($array[$mid] === $num)
        {
            $result[1]=$mid;
            $low = $mid + 1;
        }
        else if ($mid < $num)
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
$nums = [1,8,2,5,3,6,4,7,10,15,19,12,18,17,20,19,50,30,32,39,26];
$num = 12;
$sorted = sortArray($nums);
print_r($sorted);
echo "\n";
// print_r(findFLaccurance($sorted,$num));


// possible index => same as binary but return low
function possibleIndex($nums,$num)
{
    $low = 0 ;
    $high = count ($nums) -1;
    while ($low <= $high)
    {
        $mid = (int)(($high+$low)/2);
        if ($nums[$mid] == $num)
        {
            return $mid;
        }
        if ($nums[$mid] < $num)
        {
            $low = $mid +1;
        }
        else
        {
            $high = $mid -1;
        }
    }
    return $low;
}
// echo(possibleIndex($sorted,12));
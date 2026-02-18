<?php
function getFirstElement($array)
{
    return $array[0];
}


$numbers=[60,20,30,40,40,50,6,8,12,5,0,2,3];
// echo getFirstElement($numbers);


function getMaxNuminArray($array)
{
    $size=count($array);
    $sum = 0;
    $multiple=1;
    $element=$array[0];
    for($i=0;$i<$size;$i++)
    {
        $sum += $array[$i];
        $multiple *= $array[$i];
        if ($array[$i] > $element)
        {
            $element = $array[$i];
        }
    }
    echo ("Highest : " . $element . " Sum: " . $sum . " Multiple: " . $multiple);
}


// getMaxNuminArray($numbers);

// sort an array without build in functions
function sortArray($array)
{
    $size=count($array);
    for($i=0;$i<$size-1;$i++)
    {
        $size=count($array);
        for($i=0;$i<$size-1;$i++)
        {
            for($j=0;$j<$size-$i-1;$j++)
            {
                if ($array[$j] > $array[$j+1])// 5>3
                {
                    $temp = $array[$j];
                    $array[$j]= $array[$j+1];
                    $array[$j+1] = $temp;
                }
            }
        }
    }
    return $array;
}



// string to array 
$nums = implode(" ",sortArray($numbers));
// echo $nums;








//
$arr=  [1, 2, 3, 4, 5];
// Output: [2, 1, 4, 3, 5]
for ($i = 0; $i < count($arr) - 1; $i += 2) {
    [$arr[$i], $arr[$i + 1]] = [$arr[$i + 1], $arr[$i]];
}


// swap based on value
$i = array_search(20, $arr);
$j = array_search(40, $arr);

if ($i !== false && $j !== false) {
    [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
}



// class solution 
// {
    function swapByIndex($array,$i,$j)
    {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
        return $array;
    }
    
    
    function swapByValue($array,$firstValue,$secondValue)
    {
        $first = array_search($firstValue,$array);
        $second = array_search($secondValue,$array);
        if ($first!=false && $second!=false)
        {
            [$array[$first],$array[$second]] = [$array[$second],$array[$first]];
        }
            return $array;
    }
    
        function swapAdjacentElement($array)
        {
            $count = count($array);
            for ($i=0;$i<$count-1;$i+=2)
            {
                    [$array[$i],$array[$i+1]]= [ $array[$i+1] , $array[$i]];
            }
            return $array;
        }
// }
$array = [5,4,7,1,9,10,2,3,8,6];


$solution = [5,4,7,1,9,10,2,3,8,6];
// print_r(swapByIndex($solution,0,count($solution)-1));
echo " 0=0 ";

// print_r(swapAdjacentElement($array));
echo " 0=0 ";

// print_r(swapByValue($array,4,3));




    function removeDuplicates($nums) 
    {
        $seen=[];
        $result=[];
        foreach($nums as $num)
        {
            if (!isset($seen[$num]))
            {
                $seen[$num]=true;
                $result[]=$num;
            }
        } 
        return $result; 
    }

    $nums = [0,0,1,1,1,2,2,3,3,4];
    print_r (removeDuplicates($nums));



/*
    Given an integer array nums sorted in non-decreasing order, remove the duplicates in-place such that each unique element appears only once. The relative order of the elements should be kept the same.

Consider the number of unique elements in nums to be k​​​​​​​​​​​​​​. After removing duplicates, return the number of unique elements k.

The first k elements of nums should contain the unique numbers in sorted order. The remaining elements beyond index k - 1 can be ignored.

*/

// reverse integer built in function math.reverse
function reverseInteger($num)
{
    $isNegative = $num < 0;
    $num = abs($num);
    $reversed = 0;

    while ($num > 0) {
        $digit = $num % 10;
        $reversed = $reversed * 10 + $digit;
        $num = (int)($num / 10);
    }

    if ($isNegative) {
        $reversed = -$reversed;
    }

    // Handle overflow for 32-bit signed integer
    if ($reversed < -2147483648 || $reversed > 2147483647) {
        return 0;
    }

    return $reversed;
}













// string inside a string
// function strStr($haystack, $needle) 
{
    // $pos = strpos($haystack, $needle);
    // return ($pos === false) ? -1 : $pos;  
}



function strStr2($haystack, $needle)
{
    $n = strlen($haystack);
    $m = strlen($needle);

    if ($m == 0) return 0;

    for ($i = 0; $i <= $n - $m; $i++) {
        $j = 0;

        while ($j < $m && $haystack[$i + $j] === $needle[$j]) {
            $j++;
        }

        if ($j == $m) {
            return $i;
        }
    }

    return -1;
}




// Remove duplicates of all numbers, keep only one of each
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

// remove element 
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



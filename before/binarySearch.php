<?php 
// <!-- to use binary search the array should be sorted first  -->


//  sorted array direct 
$array = [1,2,5,6,8,9,10,15,16,30,33,52,65,68,69,72];
function findTarget($array,$target)
{
    $count = count($array);
    $low = 0 ;
    $high = $count -1 ; 
    while ( $low <= $high )
    {
        $mid = (int)(($low + $high ) /2 );
        if ($array[$mid] === $target )
        {
            return 'Found '. $array[$mid];
        }
        if ($array[$mid] < $target)    // mid 4<10 target 
        {
            $low = $mid+1;
        }
        else
        {
            $high = $mid -1 ;
        }
    }
    return 'Not found';
}



// echo findTarget($array,211);




//  sort array then search 

$nums = [1,8,2,5,3,6,4,7,10,15,19,12,18,17,20,19,50,30,32,39,26];
$test=[4, 3, 2, 1];

function sortArray($array)
{
    $size = count($array);
    for ($i=0;$i<$size-1;$i++)
    {
        for ($j=0;$j<$size-$i-1;$j++)
        {
            if ($array[$j] > $array[$j+1] )
            {
                $temp = $array[$j];
                $array[$j] = $array[$j+1];
                $array[$j+1]=$temp ;
            }
        }
    }
    return $array;
}
print_r(sortArray($test));

function findValue($array,$target)
{
    $count = count($array);
    $low = 0 ;
    $high = $count -1;
    while ($low <= $high)
    {
        $mid = (int)(($high + $low ) /2);
        if ($array[$mid] === $target)
        {
            return 'Found ' . $array[$mid] . " index : " . $mid;
        }
        if ($array[$mid] < $target)
        {
            $low = $mid +1 ; 
        }
        else
        {   
            $high = $mid - 1;
        }
    }
    return 'Not Found';
}

$arrayToUse = sortArray($nums);
// echo (findValue($arrayToUse,39));




// count items in array
$array_to_count = [1,8,5,9,3,7,12,15,28,88,12,12,12,12,15,88,188,1881,1518,1818,4];
$count = 0;
$find=0;
for ($i=0;$i<count($array_to_count);$i++)
{
    if ($i === $i)
    {
        $count ++ ;
    }
    if ($array_to_count[$i]=== 12)
    {
        $find ++ ;
    }
    return $count;
}

// echo $count;
// echo ' ';
// echo $find;




// first accurance :
function findFirstOccurrence($array, $target)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;
    $result = -1;

    while ($low <= $high)
    {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] === $target)
        {
            $result = $mid;
            $high = $mid - 1; // move left
        }
        elseif ($array[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid - 1;
        }
    }

    return $result !== -1
        ? "Found {$target} first index : {$result}"
        : "Not Found";
}



// last 
function findLastOccurrence($array, $target)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;
    $result = -1;

    while ($low <= $high)
    {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] === $target)
        {
            $result = $mid;
            $low = $mid + 1; // move right
        }
        elseif ($array[$mid] < $target)
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid - 1;
        }
    }

    return $result !== -1
        ? "Found {$target} last index : {$result}"
        : "Not Found";
}



// check if is rotated or not 

$array = [15, 18, 2, 3, 6, 12];
function isRotatedSorted($array)
{
    $count = count($array);
    $drops = 0;

    for ($i = 1; $i < $count; $i++)
    {
        if ($array[$i] < $array[$i - 1]) //      
        {
            $drops++;
        }
    }

    return $drops <= 1;
}


echo isRotatedSorted($array);


// search in rotated array :
function searchRotatedArray($array, $target)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;

    while ($low <= $high)
    {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] === $target)
        {
            return "Found {$target} index : {$mid}";
        }

        // Left side sorted
        if ($array[$low] <= $array[$mid])
        {
            if ($target >= $array[$low] && $target < $array[$mid])
            {
                $high = $mid - 1;
            }
            else
            {
                $low = $mid + 1;
            }
        }
        // Right side sorted
        else
        {
            if ($target > $array[$mid] && $target <= $array[$high])
            {
                $low = $mid + 1;
            }
            else
            {
                $high = $mid - 1;
            }
        }
    }

    return "Not Found";
}
$nums=[4,5,6,7,0,1,2];
// echo searchRotatedArray($nums,0);

// minimum element without dupliucates
function findMinimum($array)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;

    while ($low < $high)
    {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] > $array[$high])
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid;
        }
    }

    return "Minimum element : " . $array[$low];
}

// with duplicates
    function findMin($nums) 
    {
        $count = count($nums);
        $low = 0;
        $high = $count -1;
        while($low < $high)
        {
            $mid = (int)(($low + $high) /2);
            if ($nums[$mid] > $nums[$high]) 
            {
                $low = $mid + 1;
            } 
            else if ($nums[$mid] < $nums[$high])
            {
                $high = $mid;
            }
            else 
            {
                $high--; 
            }
        }
        return $nums[$low];
    }


// rotation count 
function findRotationCount($array)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;

    while ($low < $high)
    {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] > $array[$high])
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid;
        }
    }

    return "Rotation count : {$low}";
}


// pivot index
function findPivotIndex($array)
{
    $count = count($array);
    $low = 0;
    $high = $count - 1;

    while ($low <= $high)
    {
        $mid = (int)(($low + $high) / 2);

        // Pivot found
        if ($mid < $high && $array[$mid] > $array[$mid + 1])
        {
            return "Pivot index : {$mid}";
        }

        if ($mid > $low && $array[$mid] < $array[$mid - 1])
        {
            return "Pivot index : " . ($mid - 1);
        }

        if ($array[$low] <= $array[$mid])
        {
            $low = $mid + 1;
        }
        else
        {
            $high = $mid - 1;
        }
    }

    return "Pivot not found (array not rotated)";
}





// linear search
function linearSearch($array,$target)
{
    $count = count($array);
    for ($i=0;$i<$count;$i++)
    {
        if ($array[$i] === $target)
        {
            return "Found " . $target  . " index " . $i;
        }
    }
}


// $array = [7, 2, 9, 1, 5];
// $target = 1;
// echo linearSearch($array,$target);




// first and last occurence together, they differ in one line only
// $low = $mid + 1;(last)   =>    $high = $mid - 1(first);
    function searchRange($nums, $target) 
    {
        $count = count($nums);
        $low = 0 ;
        $high = $count -1 ;
        $result = [-1, -1];

        // First occurrence
        while ($low <= $high)
        {
            $mid = (int)(($low + $high)/2);
            if ($nums[$mid] === $target)
            {
                $result[0] = $mid;
                $high = $mid - 1; // move left
            }
            elseif ($nums[$mid] < $target)
            {   
                $low = $mid + 1;
            }
            else 
            {
                $high = $mid - 1;
            }
        }

        // Last occurrence
        $low = 0;
        $high = $count - 1;
        while ($low <= $high)
        {
            $mid = (int)(($low + $high)/2);
            if ($nums[$mid] === $target)
            {
                $result[1] = $mid;
                $low = $mid + 1; // ✅ move right
            }
            elseif ($nums[$mid] < $target)
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




    // possible index if not found 
// return low 
function searchInsert($nums, $target) 
    {
        $count = count ($nums);
        $low = 0;
        $high = $count -1 ;
        while ($low <=$high)
        {
            $mid = (int)(($low + $high)/2);
            if ($nums[$mid] === $target )
            {   
                return $mid;
            }
            if ($nums[$mid] < $target)
            {
                $low  = $mid +1;
            }
            else 
            {
                $high = $mid-1;
            }
        }  
        return $low;  
}




function twoSum($numbers, $target) 
    {
        $count = count ($numbers);
        for ($i=0;$i<$count;$i++)
        {
            for ($j=$i+1;$j<$count;$j++)
            {
                if ($numbers[$i]+$numbers[$j] === $target )
                {   
                    $i++;
                    $j++;
                    return [$i,$j];
                }
            }
        }
    }



//  3 pointers
function threeSumBrute($nums) {
    $n = count($nums);
    $res = [];
    for ($i = 0; $i < $n - 2; $i++) {
        for ($j = $i + 1; $j < $n - 1; $j++) {
            for ($k = $j + 1; $k < $n; $k++) {
                if ($nums[$i] + $nums[$j] + $nums[$k] === 0) 
                    {
                    $triplet = [$nums[$i], $nums[$j], $nums[$k]];
                    sort($triplet); // to avoid duplicates
                    if (!in_array($triplet, $res)) {
                        $res[] = $triplet;
                    }
                }
            }
        }
    }
    return $res;
}



// 3 closet numbers to reach target
/*
    At index i, we will also use:
    left = i + 1
    right = n - 1
    So the triple is:
    i , i+1 , last
*/
function threeSumClosest($nums, $target) 
{
    sort($nums);           
    $n = count($nums);
    // if the closet is directly located
    $closest = $nums[0] + $nums[1] + $nums[2];

    for ($i = 0; $i < $n - 2; $i++)
    {
        $left = $i + 1;
        $right = $n - 1;

        while ($left < $right)
        {
            $sum = $nums[$i] + $nums[$left] + $nums[$right];

            // if this sum is closer than previous best
            if (abs($sum - $target) < abs($closest - $target)) {
                $closest = $sum;
            }

            if ($sum == $target) {
                return $sum;     // exact match
            }
            elseif ($sum < $target) {
                $left++;        // need bigger sum
            }
            else {
                $right--;       // need smaller sum
            }
        }
    }

    return $closest;
}

// n-2 
// 0  1   2   3   4   5  6  7  8  9  
// n= 10
// n-2=8  will go until untel value =8 , why the 9 is left out ?












/*

    General rule (memorize this)

    If you need:

    k elements

    Then your loop must stop at:

    n - k


    For 3Sum:

    i < n - 2


    For 4Sum:

    i < n - 3
*/




/*
        Example 1 — 3 elements (3Sum)
    Array (n = 6):
    Index:  0   1   2   3   4   5
    Value:  a   b   c   d   e   f


    We want triples: (i, j, k)

    Last valid triple:

    i = 3, j = 4, k = 5


    So:

    i ≤ 3 = n - 3


    Which means:

    for ($i = 0; $i < n - 2; $i++)

    Example 2 — 4 elements (4Sum)

    Now we need:

    i, j, k, l


    Last valid quadruple:

    i = 2, j = 3, k = 4, l = 5


    So:

    i ≤ 2 = n - 4


    Loop:

    for ($i = 0; $i < n - 3; $i++)


*/



// Converts array → string → add → split → array
// add one to array 
    function plusOne($digits) 
    {
        $result = implode('',$digits);
        $add = bcadd($result,"1");
        $final = str_split($add);
        return $final;
    }
    // [1,2,3] -> [1,2,4]; , make it string by implode , bcadd, add one to it , return it to array by str_split



        function climbStairs($n) 
    {
        
        if ($n == 1)
        {
            return 1;
        }    
         if ( $n == 2 )
        {
           return 2;
        }
        $a = 1;
        $b= 2;
        
            for ($i=3;$i<=$n;$i++)
            {
                $c =$a + $b;
                $a=$b;
                $b=$c;
            }
        
        return $b;
    }
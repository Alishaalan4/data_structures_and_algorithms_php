<?php 

/*
    5️⃣ When should your brain think “HashMap”?

    If you see:

    “count”

    “frequency”

    “unique”

    “first time”

    “duplicate”

    “two sum”

    “anagram”

    “subarray sum”

    🚨 Immediately think HashMap
*/


//  counting values 
function countnums ($input)
{
    $map = [];
    $duplicate = [];
    foreach($input as $val)
    {
        if (isset($map[$val]))
        {
            $map[$val]++;
            // check if duplicate found
            $duplicate[]=$val;
        }
        else
        {
            $map[$val]=1;
        }
    }
    return $map;
    // return $duplicate;
}
$input = [1,2,2,3,3,3,2,4,2,3,5];

print_r((countnums($input)));


// explanation of the above code 
/*
    Value	Seen before?	Action	        $duplicate
        1	❌	            map[1]=1	    []
        2	❌	            map[2]=1	    []
        2	✅	            add	            [2]
        3	❌	            map[3]=1	    [2]
        3	✅	            add	            [2,3]
        3	✅	            add	            [2,3,3]
        2	✅	            add	            [2,3,3,2]
        4	❌	            map[4]=1	    [2,3,3,2]
        2	✅	            add	            [2,3,3,2,2]
        3	✅	            add	            [2,3,3,2,2,3]
        5	❌	            map[5]=1	    [2,3,3,2,2,3]

*/





function twosum($nums,$target)
{
    $map = [];
    for($i=0;$i<count($nums);$i++)
    {
        $num = $nums[$i];
        $diff = $target - $num;
        if (isset($map[$diff]))
        {
            return [$map[$diff] ,$i ];
        }
        $map[$num]=$i;
    }
    return []; // if there is no sum
}

$nums = [3,5,2,-4,8,11];
$target=7;
// print_r(twoSum($nums,$target));


// explanation of code above 
/*
    🔹 Index 0

    Circle the first number:

    i = 0
    num = 3
    need = 7 - 3 = 4


    Ask:

    “Is 4 in the map?” ❌ No

    Update map:

    map = { 3 → 0 }

    🔹 Index 1

    Circle 5:

    i = 1
    num = 5
    need = 7 - 5 = 2


    Ask:

    “Is 2 in the map?” ❌ No

    Update map:

    map = { 3 → 0, 5 → 1 }

    🔹 Index 2

    Circle 2:

    i = 2
    num = 2
    need = 7 - 2 = 5


    Ask:

    “Is 5 in the map?” ✅ YES

    Point to the board:

    map[5] = 1
    current index = 2


    ✅ Solution found:

    indices = [1, 2]
    values  = [5, 2]



*/


// check if 2 strings have the same letters 
function anagrams($str1,$str2)
{
    if (strlen($str1) != strlen($str2))
    {
        return 'False';
    }

    $map = [];
    for($i=0;$i<strlen($str1);$i++)
    {
        $ch = $str1[$i];
        if (isset($map[$ch]))
        {
            $map[$ch]++;
        }
        else
        {
            $map[$ch]=1;
        }
    }

    for ($i =0 ;$i<strlen($str2);$i++)
    {
        $ch = $str2[$i];
        if (!isset($map[$ch]))
        {
            return 'False';
        }
        $map[$ch]--;
    }

    return $map;
}

// print_r(anagrams('lkistenbu','sildsentm'));
// explain 
/*

    🧑‍🏫 Whiteboard Explanation — How This Works Together
    🧩 What problem is this code solving?

    Check whether two strings contain the same characters with the same frequency
    (order does NOT matter).

    Example:

    str1 = "anagram"
    str2 = "nagaram"


    ✅ True

    str1 = "rat"
    str2 = "car"


    ❌ False

    Step 1️⃣ Length check (first guard)

    Write on the board:

    If lengths are different → impossible


    Code:

    if (strlen($str1) != strlen($str2)) {
        return 'False';
    }


    🧠 Why?

    Anagrams must have the same number of characters

    Early exit = efficient

    Step 2️⃣ Create the HashMap (frequency table)

    Draw this:

    HashMap
    character → count


    Code:

    $map = [];


    Explain:

    “This map tracks how many times each character appears.”

    Step 3️⃣ First loop — COUNT characters in str1

    Write on the board:

    str1 = "anagram"

    a → 3
    n → 1
    g → 1
    r → 1
    m → 1


    Code:

    for($i=0;$i<strlen($str1);$i++)
    {
        $ch = $str1[$i];
        if (isset($map[$ch])) {
            $map[$ch]++;
        } else {
            $map[$ch]=1;
        }
    }


    🧠 Meaning:

    Every character increases its count

    This is the exact same counting pattern you used before

    Step 4️⃣ Second loop — SUBTRACT using str2

    This is the clever part 🔥

    Write on the board:

    str2 = "nagaram"


    For each character:

    decrease its count


    Code:

    for ($i =0 ;$i<strlen($str2);$i++)
    {
        $ch = $str2[$i];
        $map[$ch]--;
    }


    🧠 Interpretation:

    If str2 has the same characters as str1

    Every +1 will be canceled by a -1

    Step 5️⃣ Visual example (VERY IMPORTANT)
    Example 1 — Valid anagram
    str1 = "abca"
    str2 = "cbaa"


    After first loop:

    a → 2
    b → 1
    c → 1


    After second loop:

    a → 0
    b → 0
    c → 0


    ✅ Perfect match

    Example 2 — NOT an anagram
    str1 = "rat"
    str2 = "car"


    After first loop:

    r → 1
    a → 1
    t → 1


    After second loop:

    c → -1
    a → 0
    r → 0
    t → 1


    ❌ Counts are NOT all zero
*/




function lengthOfLongestSubstring($s)
{
    $map = [];
    $left = 0;
    $maxLen = 0;

    for ($right = 0; $right < strlen($s); $right++) {
        $ch = $s[$right];

        // if character seen AND inside current window
        if (isset($map[$ch]) && $map[$ch] >= $left) {
            $left = $map[$ch] + 1;
        }

        // store last index of character
        $map[$ch] = $right;

        // update max length
        $maxLen = max($maxLen, $right - $left + 1);
    }

    return $maxLen;
}

/*
    s = "abba"
    right=0 → "a" → window="a" → max=1
    right=1 → "b" → window="ab" → max=2
    right=2 → "b" → duplicate → move left after first "b"
    window="b"
    right=3 → "a" → window="ba" → max=2
*/

/*
    You are given an absolute path for a Unix-style file system, which always begins with a slash '/'. Your task is to transform this absolute path into its simplified canonical path.

The rules of a Unix-style file system are as follows:

A single period '.' represents the current directory.
A double period '..' represents the previous/parent directory.
Multiple consecutive slashes such as '//' and '///' are treated as a single slash '/'.
Any sequence of periods that does not match the rules above should be treated as a valid directory or file name. For example, '...' and '....' are valid directory or file names.
The simplified canonical path should follow these rules:

The path must start with a single slash '/'.
Directories within the path must be separated by exactly one slash '/'.
The path must not end with a slash '/', unless it is the root directory.
The path must not have any single or double periods ('.' and '..') used to denote current or parent directories.
Return the simplified canonical path.

*/

function simplifyPath($path) {
    $stack = [];
    $components = explode('/', $path);

    foreach ($components as $component) {
        if ($component === '' || $component === '.') {
            continue;
        } elseif ($component === '..') {
            array_pop($stack);
        } else {
            $stack [] = $component;
        }
    }

    $simplifiedPath = '/' . implode('/',$stack);
    return $simplifiedPath;
}














    function majorityElement3($nums) 
    {
            $map = [];
            $res=[];
            $morethan = (count($nums)/3);
            foreach($nums as $num)
            {
                if (isset($map[$num]))
                {
                    $map[$num]++;
                }
                else
                {
                    $map[$num]=1;
                }
            }
            foreach ($map as $num => $count) 
            {
             if ($count > $morethan) 
                {
                    $res[] = $num;
                }
            }
             return $res;
}   

function majorityElement2($nums) {
    $count = count($nums);
    $morethan = floor($count / 2);
    $map = [];

    foreach ($nums as $num) {
        if (isset($map[$num])) {
            $map[$num]++;
        } else {
            $map[$num] = 1;
        }

        if ($map[$num] > $morethan) {
            return $num; // found majority element
        }
    }
    
    return null; // just in case
}




function countNumbs($nums)
{
    $map = [];
    foreach($nums as $num)
    {
        if(isset($map[$num]))
        {
            $map[$num]++;
        }
        else
        {
            $map[$num]=1;
        }
    }
    return $map;
}
print_r(countNumbs([1,2,3,2,4,5,3,6,7,8,5,9,1]));

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
// test the countduplicates
$nums = [1,2,3,2,4,5,3,6,7,8,5,9,1];
 print_r(countDuplicates($nums)); // Output: [2,3,5,1]


function First_non_repeating_hashmap($nums)
{
    $map = [];
    foreach($nums as $num)
    {
        if(isset($map[$num]))
        {
            $map[$num]++;
        }
        else
        {
            $map[$num]=1;
        }
    }
    foreach($nums as $num)
    {
        if ($map[$num] == 1)
        {
            return $num;
        }
    }
    return null;
}
<?php 
/*
    📌 Definition of Stack

    A stack is a linear data structure that follows the LIFO principle (Last In, First Out), where insertion and deletion of elements take place from only one end called the TOP.

    Only the top element is accessible at any time.

    📌 Usage of Stack (Why we use it)

    Stacks are used when:

    The most recent operation must be processed first

    You need temporary storage

    You need to reverse order

    Common real-world & system usages

    Function calls (Call Stack)

    Undo / Redo operations

    Expression evaluation (postfix, prefix)

    Syntax parsing (parentheses checking)

    Backtracking algorithms

    Depth-First Search (DFS)

    📌 Stack Operations
    Operation	Description
    push	Insert element at top
    pop	Remove element from top
    peek / top	View top element
    isEmpty	Check if stack is empty
    isFull	(array stack) check overflow
    📌 Class Representation of Stack (Conceptual)
    UML-Style Class (Whiteboard)
    ------------------------
    |       Stack          |
    ------------------------
    | - items              |
    | - top                |
    ------------------------
    | + push(element)      |
    | + pop()              |
    | + peek()             |
    | + isEmpty()          |
    ------------------------

*/

// linked list with stack
class Node
{
    public $data;
    public $next=null;
    public function __construct($data)
    {
        $this->data = $data;
    }
}

class stackList
{
    // top is now like head
    public $top=null;

    public function push($value)
    {
        $data = new Node($value);
        $data->next = $this->top;
        $this->top = $data;
    }

    public function pop()
    {
        if ($this->top->data == null)
        {
            return false;
        }
        $data = $this->top->data;
        $this->top = $this->top->next;
        return $data;
    }

    public function peek()
    {
        return $this->top->data;
    }
    public function top()
    {
        return $this->top->data;
    }

    public function isEmpty()
    {
        return $this->top == null ;
    }

    public function display()
    {
        $current = $this->top;
        while ($current != null)
        {
            echo $current->data;
            $current= $current->next;
        }
    }

    public function reverse()
    {
        $current = $this->top;
        $prev=null;
        $next=null;
        while($current!= null)
        {
            
            $next =  $current-> next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }
        $this->top=$prev;
    }

    public function middle()
    {
        $current = $this->top;
        $slow= $current;
        $fast=$current;
        while ($fast != null && $fast->next!=null)
        {
            $slow = $slow->next;
            $fast=$fast->next->next;
        }
        return $slow->data;
    }

    public function sort()
    {
        do 
        {
            $swapped=false;
            $current = $this->top ;
            while ($current->next != null)
            {
                if ($current->data > $current->next->data)
                {
                    $temp = $current->data;
                    $current->data= $current->next->data;
                    $current->next->data = $temp;
                    $swapped=true;
                }
                $current=$current->next;
            }
        }while ($swapped);
    }
}





$stack = new stackList();
$stack->push(1);
$stack->push(2);
$stack->push(3);
$stack->push(4);
$stack->push(5);
$stack->push(6);
$stack->push(7);
$stack->push(8);
$stack->push(9);
$stack->push(10);
$stack->push(11);
$stack->push(12);
$stack->push(13);
$stack->push(14);
$stack->push(15);
$stack->push(16);
$stack->push(17);


// $stack->display();
// $stack->pop();
// echo "\n";
// $stack->reverse();
// echo "\n";

// $stack->display();







$stack2 = new stackList();
$stack2->push(8);
$stack2->push(5);
$stack2->push(9);
$stack2->push(3);
$stack2->push(4);
$stack2->push(12);
$stack2->push(11);
$stack2->push(10);
$stack2->push(8);
$stack2->push(8);
$stack2->push(52);
$stack2->push(90);

// $stack2->display();
echo "\n";
$stack2->sort();
// $stack2->display();

























// For odd length, there is a single middle → slow lands exactly on it ✅
// For even length, there are two middle nodes → slow lands on second middle ✅
function findMiddle($head)
{
    if ($head === null) return null;

    $slow = $head;
    $fast = $head;

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return $slow->data;
}

$head = new Node(1);
$head->next = new Node(2);
$head->next->next = new Node(3);
$head->next->next->next = new Node(4);
$head->next->next->next->next = new Node(5);
$head->next->next->next->next->next = new Node(6);
$head->next->next->next->next->next->next = new Node(7);
// echo (findMiddle($head)); //4
$head->next->next->next->next->next->next->next = new Node(8);
// echo(findMiddle($head));// 5

// find first middle in even length
function findMiddleFirst($head) {
    if ($head === null) return null;

    $slow = $head;
    $fast = $head->next; // Start fast one step ahead

    while ($fast !== null && $fast->next !== null) {
        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return $slow->data;
}







    //  check for parantheses 
function isValid($s) 
{
        $stack = new Stack();
        $map = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    foreach (str_split($s) as $ch) {
        if (in_array($ch, ['(', '{', '['])) {
            $stack->push($ch);
        } else {
            if ($stack->isEmpty() || $stack->pop() !== $map[$ch]) {
                return false;
            }
        }
    }

    return $stack->isEmpty();
}







    function longestValidParentheses($s)
    {
        $stack = new Stack();
        $stack = [];
        $stack[] = -1;      
        $maxLen = 0;
        for ($i = 0; $i < strlen($s); $i++) 
        {
            if ($s[$i] === '(') 
            {
                $stack[] = $i;       
            }    
            else 
            {
                array_pop($stack);
                if (empty($stack)) 
                {
                    $stack[] = $i;  
                } 
                else 
                {
                    $maxLen = max($maxLen, $i - end($stack));
                }
            }
        }
        return $maxLen;
    }
// explanation
/*  
    🧩 Step 0 — Initialize

    String:

    Index:  0 1 2 3 4 5
    Chars:  ) ( ) ( ) )


    Stack:

    [-1]


    🟢 -1 = base index
    Used when a valid substring starts from index 0.

    🔁 Walk Through (DRAW THIS)
    i = 0 → )

    Action:

    Pop stack

    Stack becomes empty → push current index

    Stack:

    [0]


    Reason:
    ❌ unmatched ), reset base

    i = 1 → (

    Action:

    Push index

    Stack:

    [0, 1]

    i = 2 → )

    Action:

    Pop → removes 1

    Stack now:

    [0]


    Length:

    2 - 0 = 2


    ✔ valid substring "()"

    Max = 2

    i = 3 → (

    Action:

    Push index

    Stack:

    [0, 3]

    i = 4 → )

    Action:

    Pop → removes 3

    Stack now:

    [0]


    Length:

    4 - 0 = 4


    ✔ valid substring "()()"

    Max = 4 ✅

    i = 5 → )

    Action:

    Pop → removes 0

    Stack empty → push index

    Stack:

    [5]


    End.

    🏁 Final Answer
    Longest valid parentheses = 4
*/


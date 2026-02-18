<?php 



/*
    Insert (head, tail, middle)

    Delete (by value, by position,all value of data)

    Reverse a linked list

    Detect a cycle (Floyd’s slow & fast pointers)

    Find middle element

    Merge two sorted lists

    Remove nth node from end

    Palindrome linked list

    Intersection of two lists
 */


    /*
        1️⃣ Reverse a Linked List

Why asked: Pointer manipulation, fundamentals
Approach: Iterative (prev, curr, next)
Complexity: O(n) time, O(1) space

2️⃣ Detect a Cycle (Floyd’s Algorithm)

Why asked: Two-pointer mastery
Approach: Slow & fast pointers
Complexity: O(n) time, O(1) space

3️⃣ Find the Middle of a Linked List

Why asked: Pointer logic
Approach: Slow moves 1, fast moves 2
Complexity: O(n) time

4️⃣ Remove Nth Node From End

Why asked: Edge cases
Approach: Dummy node + two pointers
Complexity: O(n) time

5️⃣ Merge Two Sorted Linked Lists

Why asked: Clean logic & comparisons
Approach: Dummy head, pointer walk
Complexity: O(n + m) time

6️⃣ Palindrome Linked List

Why asked: Multi-step reasoning
Approach:

Find middle

Reverse second half

Compare halves
Complexity: O(n) time, O(1) space

7️⃣ Intersection of Two Linked Lists

Why asked: Pointer redirection trick
Approach: Switch heads when null
Complexity: O(n) time, O(1) space

8️⃣ Remove Duplicates from Sorted List

Why asked: Pointer movement precision
Approach: Compare curr and curr->next
Complexity: O(n) time

9️⃣ Reverse Linked List II (Between m and n)

Why asked: Advanced pointer control
Approach: Partial reverse with reconnect
Complexity: O(n) time

🔟 Odd Even Linked List

Why asked: Pointer re-wiring
Approach: Maintain odd & even chains
Complexity: O(n) time

    */

class Node 
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next= null;
    }
}

class linkedlist
{
    public $head;
    public function __construct()
    {
        $this->head=null;
    }

    public function insert($data)
    {   
        // first create the node
        $newNode = new Node($data);
        // check if head is null 
        if ($this->head === null)
        {
            $this->head = $newNode;
        }
        else
        {
            $currentNode= $this->head;
            while ($currentNode->next !== null)
            {
                $currentNode = $currentNode->next;
            }
            $currentNode->next=$newNode;
        }
    }

    public function remove ($data)
    {
        if ($this->head === null)
        {
            return;
        }
        // if it is the head to be removed
        if ($this->head->data ===$data)
        {
            // put the arrow and the next item so the item become the head
            $this->head = $this->head->next;
            return;
        }

        $currentNode = $this->head;
        while($currentNode->next != null && $currentNode->next->data !== $data)
        {
            $currentNode = $currentNode->next;
        }

        if ($currentNode->next != null)
        {
            $currentNode-> next = $currentNode->next->next; 
        }

    }

    public function display ()
    {
        $currentNode= $this->head;
        while ($currentNode != null)
        {
            echo $currentNode->data . " ";
            $currentNode=$currentNode->next;  //i++
        }
    }


    // find by value or index
    public function findByValue($target)
    {
        $currentNode = $this->head;
        $counter = 0;
        while ($currentNode->next != null)
        {
            if ($currentNode->data == $target)
            {
                return $counter;
            }

            $currentNode=$currentNode->next;
            $counter++;
        }
        return 'Not found';
    }

    public function sort()
    {
        if ($this->head == null) return;
            do 
            {
                $swapped = false;
                $currentNode = $this->head;
            
                while ($currentNode->next != null) 
                {
                    if ($currentNode->data > $currentNode->next->data) 
                    {
                        $temp = $currentNode->data;
                        $currentNode->data = $currentNode->next->data;
                        $currentNode->next->data = $temp;
                        $swapped = true;
                    }
                    $currentNode = $currentNode->next;
                }
            } while ($swapped);
    }

    // insert at head
    //  [], []->head , head=[$data]
    public function insertAtHead($node)
    {
        $data = new Node($node);
        $data->next = $this->head;
        $this->head = $data;
    }

    public function insertTail($data)
    {
        $data = new Node($data);
        $currentNode = $this->head;
        while ($currentNode-> next != null)
        {
            $currentNode=$currentNode->next;
        }
        $currentNode->next= $data;
    }


    public function insertAtPosition($data,$position)
    {
        $data = new Node($data);
        if ($position == 0)
        {
            $data->next=$this->head;
            $this->head=$data;
        }
        $currentNode = $this->head;
        for ($i=0;$i<$position - 1 && $currentNode;$i++)
        {
            $currentNode=$currentNode->next;
        }
        $data->next = $currentNode->next;
        $currentNode->next=$data;
    }


    // [0.1.2.3.4]
    public function deleteByValue($value)
    {
        if ($this->head->data == $value)
        {
            $this->head=$this->head->next;
        }

        $currentNode = $this->head;
        while ($currentNode->next != null && $currentNode->next->data != $value)
        {
            $currentNode=$currentNode->next;
        }

        if ($currentNode->next)
        {
            $currentNode->next = $currentNode->next->next;
        }
    }


    public function deleteat($pos)
    {
        if ($pos == 0 )
        {
            $this->head =$this->head->next;
            return;
        }
        $currentNode=$this->head;
        for($i=0;$i<$pos-1 && $currentNode->next ; $i++)
        {
            $currentNode=$currentNode->next;
        }
        if ($currentNode->next)
        {
            $currentNode->next = $currentNode->next->next;
        }
    }


    public function reverse()
    {
        $prev = null;
        $currentNode = $this->head;
        while ($currentNode)
        {
            $next = $currentNode->next;
            $currentNode->next = $prev;
            $prev= $currentNode;
            $currentNode=$next;
        }
        $this->head=$prev;
    }



    public function hasCycle()
    {
        $slow = $this->head;
        $fast = $this->head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow === $fast) return true;
        }

        return false;
    }


    public function findMiddle()
    {
        $slow = $this->head;
        $fast = $this->head;

        while ($fast && $fast->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow ? $slow->data : null;
    }

    function removeNthFromEnd($head, $n) 
    {
        $dummy = new Node(0);
        $dummy->next = $head;

        $slow = $dummy;
        $fast = $dummy;

        for ($i = 0; $i <= $n; $i++) {

            $fast = $fast->next;
        }

        while ($fast) {
            $slow = $slow->next;
            $fast = $fast->next;
        }

        $slow->next = $slow->next->next;
        return  $dummy->next;   
    }


}


// create nodes and print them 
/*
    $node1=new  Node('Node1');
    $node2=new  Node('Node2');
    $node3=new  Node('Node3');

    $node1->next=$node2;
    $node2->next=$node3;


    // print linked list 
    $currentNode = $node1;
    while ($currentNode !== null)
    {
        echo $currentNode->data;
        $currentNode=$currentNode->next;
    }
*/


// create a linked list , add remove print 

/*
    $linkedlist = new linkedlist();
    $linkedlist->insert(1);
    $linkedlist->insert(2);
    $linkedlist->insert(3);
    $linkedlist->insert(4);
    $linkedlist->insert(5);
    $linkedlist->display();
    $linkedlist->remove(4);
    $linkedlist->display();
    $linkedlist->remove(1);
    $linkedlist->display();
*/

/*
    $linkedlist = new linkedlist();
    $linkedlist->insert(1);
    $linkedlist->insert(2);
    $linkedlist->insert(3);
    $linkedlist->insert(4);
    $linkedlist->insert(5);
    $linkedlist->insert(6);
    // $linkedlist->display();
    // echo ($linkedlist->findByValue(3));
*/


/*
    $linkedlist2 = new linkedlist();
    $linkedlist2->insert(7);
    $linkedlist2->insert(2);
    $linkedlist2->insert(5);
    $linkedlist2->insert(3);
    $linkedlist2->insert(8);
    $linkedlist2->insert(10);
    $linkedlist2->insert(90);
    $linkedlist2->insert(1);
    $linkedlist2->insert(15);
    // $linkedlist2->display();
    // $linkedlist2->sort();
    $linkedlist2->display();
    $linkedlist2->insertAtHead(88);
    echo ( " = ");
    $linkedlist2->display();
    $linkedlist2->insertTail(90);
    echo (" = ");
    $linkedlist2->display();
*/

/*
    $linkedlist3 = new linkedlist();
    $linkedlist3->insert(0);
    $linkedlist3->insert(1);
    $linkedlist3->insert(2);
    $linkedlist3->insertAtPosition(4,2);
    $linkedlist3->display();
    $linkedlist3->deleteByValue(2);
    echo " = ";
    $linkedlist3->display();
*/









function swapPairs($head)
{
    $dummy = new Node(0);
    $dummy->next = $head;
    $prev = $dummy;

    while ($prev->next != null && $prev->next->next != null) {
        $a = $prev->next;
        $b = $a->next;

        // swap
        $a->next = $b->next;
        $b->next = $a;
        $prev->next = $b;

        // move forward
        $prev = $a;
    }

    return $dummy->next;
}



    function mergeTwoLists($list1, $list2) 
    {
        $l3 = new Node(0);
        $tail = $l3;
        while ($list1!= null && $list2 !=null)
        {
            if ($list1->val <= $list2->val)
            {
                $tail->next = $list1;
                $list1 = $list1->next;
            }
            else
            {
                $tail->next = $list2;
                $list2 = $list2->next;
            }
            $tail = $tail->next;
        }
        if ($list1 != null)
        {
            $tail->next = $list1;
        }
        if ($list2 != null)
        {
            $tail->next=$list2;
        }

        return $l3->next;
    }




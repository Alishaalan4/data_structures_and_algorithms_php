
1- to return null if a value doesnt exist but at the same time return the row => left join 
LEFT JOIN is the formal SQL way to say:
“Give me all people, even if there is no matching address.”
Trying to force this logic using WHERE is either:
Incorrect
Or very inefficient:
SELECT 
    p.firstName,
    p.lastName,
    a.city,
    a.state
FROM Person p, Address a
WHERE p.personId = a.personId
   OR a.personId IS NULL;



2- second highest salary
select MAX(salary) as 'SecondHighestSalary'
from Employee
where salary < (select MAX(salary) from Employee) 
/*
Employee table:

id	salary
1	100
2	200
3	300
Inner query:
SELECT MAX(salary) FROM Employee;   -- 300
Outer query:
SELECT MAX(salary) FROM Employee WHERE salary < 300;  -- 200
Result:
SecondHighestSalary = 200
*/


3-
select score ,Dense_Rank() over (order by score desc) as 'rank'
from scores
order  by score desc

DENSE_RANK() OVER (ORDER BY score DESC) AS `rank`
This line means:
“Give each row a rank number based on its score, from highest to lowest, with no gaps between ranks.


4- select the employee who has higher salary than his manager 
select e1.name as Employee
from Employee e1
where e1.salary > (select e2.salary from Employee e2 where e2.id = e1.managerid )

other way normal
SELECT e.name AS Employee
FROM Employee e, Employee m
WHERE e.managerId = m.id
  AND e.salary > m.salary;



5-GROUP BY email
This puts all identical emails together:
less
Copy code
a@b.com → [1, 3]
c@d.com → [2]
select email as Email  from Person
group by email
having count(*) > 1
emails duplicate return 



6-return employee with highest salary in each department
select d.name as Department , e.name as Employee ,e.salary as Salary
from Employee  e , Department d
where e.departmentId = d.id and e.salary  = (select MAX(salary) from employee where departmentId = e.departmentId)


6- delete duplicate email by larger id
delete p1 
from Person p1 , Person p2
where p1.email = p2.email and p1.id > p2.id



7- compare records 
LAG() is a window function that lets you look at the value in a previous row without joining the table to itself.
SELECT id
FROM (
    SELECT *,
           LAG(temperature) OVER (ORDER BY recordDate) AS prev_temp
    FROM Weather
) t
WHERE temperature > prev_temp;




Word	        Means
GROUP BY	    Put same things together
HAVING	        Choose which groups to keep
ORDER BY	    Sort the result





select max number without duplicates 
select max(num) as num 
from 
(
    select num 
    from mynumbers
    group by num 
    having count(*)= 1
)t;




# Write your MySQL query statement below\
# update query on condition
update salary
set sex =  
case
    when sex='m' then 'f'
    when sex='f' then 'm'
end;



<!-- exercises -->
Level 1 — Basic SELECT / WHERE

Filter rows
Table: Employees(id, name, salary, department, city)
Question: List the names of employees in the “IT” department with salary > 5000.

select name from employees
where department='IT' and salary>5000


DISTINCT
Table: Orders(order_id, customer_id, product_id)
Question: List all distinct customer IDs who made orders.

select distinct customer_id from orders 


Level 2 — Aggregate Functions + GROUP BY

COUNT / GROUP BY
Table: Orders(order_id, customer_id, product_id)
Question: Find how many orders each customer made. Return customer_id and order_count.

select customer_id , count(*) as order_count
from orders
group by customer_id




SUM / AVG
Table: Sales(sales_id, product_id, amount)
Question: Find total sales amount for each product.
select product_id , sum (amount) as sum
from sales
group by product_id

HAVING
Table: ActorDirector(actor_id, director_id, timestamp)
Question: Find actor-director pairs who worked together at least 3 times.
select actor_id , director_id
from actordirector 
group by actor_id,director_id
having count(*) >= 3



Level 3 — Joins

INNER JOIN
Tables: Customer(customer_id, name), Orders(order_id, customer_id, product_id)
Question: List customer names and the product IDs they ordered.
select customer.name , orders.product_id
from customer 
join orders on orders.customer_id  = customer.customer_id



LEFT JOIN
Tables: Person(person_id, name), Address(person_id, city)
Question: List all people with their city. If they have no address, show NULL.
select name , city
from person
left join  address on person.person_id = address.person_id





Complex JOIN
Tables: Customers, Orders, Products(product_id, name)
Question: List all customers and the names of products they bought. Include customers who didn’t buy anything.

Level 4 — CASE / Conditional Logic

CASE in SELECT
Table: Employees(id, name, salary)
Question: Add a column salary_level where salary > 8000 → “High”, 5000–8000 → “Medium”, else → “Low”.
select salary 
case 
    when salary > 8000 then 'High'
    when salary>5000 and salary < 8000 then 'Medium'
    else 'low'
end as salary_level
from employee



CASE in aggregate
Table: Orders(order_id, customer_id, status)
Question: Count how many orders are “delivered” and how many are “pending” for each customer.
SELECT customer_id,
SUM(CASE WHEN status = 'delivered' THEN 1 ELSE 0 END) AS delivered_count,
SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) AS pending_count
FROM Orders
GROUP BY customer_id;





Level 5 — “All / None / Existence” Problems

All Products
Tables: Customer(customer_id, product_id), Product(product_id)
Question: Find customers who bought all products. ✅ (the one we did earlier)
select customer_id , product_id
from customer
group by customer_id
having count(distinct product_id) = (select count(*) from product)


/*
    🔥 Key lesson

When the problem says:

“Find who bought ALL…”

You should think:

COUNT per group = COUNT total


*/



Not Exists / Missing Rows
Tables: Student(student_id), Enrollment(student_id, course_id)
Question: Find students who did not enroll in course_id = 5.

SELECT s.student_id
FROM Student s
LEFT JOIN Enrollment e
    ON s.student_id = e.student_id
    AND e.course_id = 5
WHERE e.course_id IS NULL;




Level 6 — Combined / Hard

Triangle Problem
Table: Triangle(x, y, z)
Question: Add a column triangle → “Yes” if x + y > z AND x + z > y AND y + z > x, else “No”.
select x,y,z
case
    when x + y > z AND x + z > y AND y + z > x then 'yes'
    else 'no'
end as triangle 



Largest Single Number
Table: MyNumbers(num)
Question: Return the largest number that appears only once. Return NULL if none.
select  max(num) from (select num from mynumbers group by num  having count(*) =1 ) 



Actor/Director Multiple Conditions
Table: ActorDirector(actor_id, director_id, timestamp)
Question: Return all actor-director pairs who worked together exactly 3 times
select actor_id,director_id
from ActorDirector
group by actor_id,director_id
having count(*) =3




==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
==============================================================================================
=============================================================================================
==============================================================================================




-- solving part 2 
q1 - select * from employees where salary > 5000
q2 - select * from employees where department = 'IT'
q3 - select name , salary from Employees


q4 - select * from orders where order_date > '01-01-2024' order by order_date asc
q5 - select order_id,sum(amount) as total amount from orders order by amount asc

q6 - select seller , sum(amount) as total_sales from sales group by seler 
q7 - select seller , sum (amount) as total sales from sales group by seler having count(amount) > 10000


q8 - select class, AVG(score) as avg_score  from students group by class 
q9 - select class, AVG(score) as avg_score  from students group by class having count(score) > 80

q10 - select name , total from Customers
join orders on orders.customer_id = customers.id 

q11 -   select customers.name
from customers
left join orders on orders.customer_id = customers.id
where orders.id is null;

q12 -   select name , sum(total) as total_spent 
        from Customers
        left join orders on orders.customer_id = customers.id
        group by name 
        having count(total) > 1000



q13 - 
q14 - 


        


🔵 LEVEL 4 – Subqueries
6. Employees

| id | name | salary | department |

Q13. Find employees earning more than the average salary
select * from employees where salary > (select AVG(salary) from employees )





Q14. Find the employee(s) with the highest salary
select 
select * from employee where salary = (Select max(salary) from employee)



🔴 LEVEL 5 – Real Interview Problems
7. Duplicates

Table: Users
| id | email |

Q15. Find all duplicate emails
select email
from users
group by email
having count(*) > 1;

8. Logs

| id | num |

Q16. Find numbers that appear 3 times consecutively

9. Orders

| order_id | customer_id | order_date |

Q17. Find customers who ordered on at least 3 different days
select customer_id
from orders
group by customer_id
having count(distinct order_date) >= 3;
10. Salary

| id | name | salary |

Q18. Find the 2nd highest salary

select max(salary) as second_highest
from salary
where salary < (
    select max(salary)
    from salary
);
Q19. Find the Nth highest salary

🔥 LEVEL 6 – Advanced
11. Employees

| id | name | salary | manager_id |

Q20. Find employees who earn more than their manager
select e.name as employee, m.name as manager
from employees e
join employees m
     on e.manager_id = m.id
where e.salary > m.salary;


12. Transactions

| id | user_id | amount | date |

Q21. Find users whose spending increased every month





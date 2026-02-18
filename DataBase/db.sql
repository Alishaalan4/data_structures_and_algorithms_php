-- second highest salary
select max(salary) as 'second highest salary'
from employee
where salary < (Select max(salary) from employee)


--employee who has higher salary than his manager
select e1.name as employee from employee e1
where e1.salary > ( select e2.salary from employee e2 where e2.id = e1.managerid) 


-- highest employee in his department 
select d.name  as 'Department' , e.name as 'Employee' , e.salary as 'Salary'
from Employee e
join Department d on d.id = e.departmentId 
where e.salary = (select max(salary) from employee where departmentId = e.departmentID)




-- 

Employee

id | name | salary | departmentId | managerId


Department

id | name


Person

id | email


Logs

id | num


🟢 EASY (1–5)
1️⃣ Get all employees with salary greater than 5000.
    select * from employee where salary > 5000
2️⃣ Count how many employees are in each department.
        -- 1=>1 2=>1 3=>1 4=>2 5=>2
    select departmentID, count(*) as 'total emplotee'
    from employee
    group by departmentID 
3️⃣ Find employees whose name starts with 'A'.
    select * from employee where name like 'A%'
4️⃣ Get the highest salary in the company.
    select max(Salary) as 'highest in company' from employee
5️⃣ List all employees ordered by salary descending.
    select * from employee order by salary desc


🟡 MEDIUM (6–10)
6️⃣ Find employees who earn more than their manager.
    select name 
    from employee e1
    join employee e2 on e1.id = e2.managerId
    where e1.salary > e2.salary
7️⃣ Find the second highest salary (distinct).
    select name 
    from employee 
    where salary < (select max(salary) from employee)
8️⃣ Get the employee(s) with the highest salary in each department.
    select e.name , d.name
    from employee e
    join department d on e.departmentID = d.id
    where e.salary > (select max(salary) from employee where e.departmentID = d.id) 
9️⃣ Delete duplicate emails in Person, keeping only the smallest id.
        DELETE p1
        FROM Person p1
        JOIN Person p2
        ON p1.email = p2.email
        AND p1.id > p2.id;
🔟 Find departments where the average salary is greater than 6000.
        select d.name, avg(e.salary) as 'average'
        from employee e
        join department d on d.ID = e.departmentID
        group by d.name
        having avg(e.salary) > 6000
🔴 HARD (11–15)
1️⃣1️⃣ Find employees who have the same salary as someone else.
        SELECT DISTINCT e1.name
        FROM Employee e1
        JOIN Employee e2 
        ON e1.salary = e2.salary
        AND e1.id <> e2.id;
        <> : no matching column 
1️⃣2️⃣ Find numbers that appear at least 3 times consecutively in Logs.

1️⃣3️⃣ Rank employees by salary within each department.
        select name ,department ,DENSE_RANK() over (order by salary desc) as 'rank'
        from employee e
        join department d on d.id = e.departmentID
        group by d.departmentID
1️⃣4️⃣ Find employees whose salary is higher than the average salary of their department.
    SELECT e.name
    FROM Employee e
    WHERE e.salary > (
        SELECT AVG(salary)
        FROM Employee
        WHERE departmentId = e.departmentId
    );
1️⃣5️⃣ Get the top 3 highest distinct salaries.
        select distinct salary from employee
        order by salary desc
        limit 3

-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================
-- ================================================================================================================

-- part 2

Sample Database Schema

Tables:

employees
| emp_id | first_name | last_name | dept_id | salary | hire_date |
|--------|------------|-----------|---------|--------|-----------|

departments
| dept_id | dept_name | location |

projects
| proj_id | proj_name | dept_id | budget |

employee_projects
| emp_id | proj_id | assigned_date |

Easy Questions (1–10)

Select all columns from the employees table.
    select * from employees

Select first_name and last_name of all employees.
    select first_name, last_name from employees

Find all employees whose salary is greater than 5000.
    select * from employee where salary > 5000
Find all employees in the Sales department.
    select * 
    from employee e
    join departments d on d.dept_id = e.dept_id
    where d.dept_name = 'Sales'
Count the total number of employees.
    select e.id,count(*) as 'employee count'
    from employee e
Find the maximum salary among employees.
    select max(salary) as 'max salary' from employee
Find employees hired after 2022-01-01.
    select * from employee where hire_date > '2022-01-01'
Select distinct dept_id values from employees.
    select distinct d.dept_id,e.first_name 
    from employee e
    join department d on d.dept_id=e.dept_id
Order all employees by last_name ascending.
    select * from employee 
    order by last_name asc
Select employees whose first name starts with ‘A’.
    select * from employee where first_name like 'A%'







Medium Questions (11–25)

Find the average salary for each department.
    select d.dept_name,avg(e.salary) as 'avg salary'
    from employee e
    join department d on d.dept_id = e.dept_id
    group by d.dept_name
    
List employees with their department name (use JOIN).
    select e.first_name,e.last_name,d.dept_name
    from employee e
    join department d on d.dept_id=e.dept_id

Find the total budget for all projects.
    select sum(budget) as 'total_sum' 
    from projects
List employees working on more than 1 project.
    select empId from employee
    where (employee.emp_id = employee_projects.emp_id) and (mployee_projects.projid =project.proj_id)
    group by emp_id
    having count(*) > 1
Find departments with more than 5 employees.
    select dept_id,dept_name,count(emp_id) 
    from employees e
    join departments d on d.dept_id = e.dept_id
    group by emp_id
    having count(emp_id)>5
Find the second highest salary in the employees table.
    select salary from employee
    where salary < (select max(salary) from employee)
List employees and their project names (use JOIN).
    select e.first_name,e.last_name,projects.proj_name
    from employees e
    join employee_projects ep on e.emp_id=ep.emp_id
    join project p on p.proj_id=ep.proj_id
Find employees not assigned to any project.
    select e.first_name,e.last_name,projects.proj_name
    from employees e
    join employee_projects ep on e.emp_id=ep.emp_id
    join project p on p.proj_id=ep.proj_id
    where employee_projects.emp_id is null
Find projects with a budget greater than the average project budget.
    select p.proj_name 
    from project p
    where p.budget > (select avg(budget) from project)
Find employees whose salary is between 3000 and 7000.
    select * from employee where salary>= 300 and salsey <=7000
Count employees in each department who earn more than 4000.
    select d.dept_name,count(*) as total 'total emp earning more than 4000'
    from employee e
    join departments d on d.dept_id = e.dept_id
    where e.slary>4000
    group by dept_id
Find the earliest hire date in the company.
    select min(hire_date) from employee 
    select hire_date from employee order by hire_date asc limit 1 
Update the salary of employee emp_id = 5 to 6000.
    update employee set salary=6000 where emp_id=5 
Delete employees who have never been assigned to any project.
    delete emp_id from employee where emp-id not in (select emp_id from employee_projects)
Insert a new department Marketing with dept_id = 10 and location = 'NYC'.
INSERT INTO departments (dept_id, dept_name, location)
VALUES (10, 'Marketing', 'NYC');
Hard Questions (26–30)

Find the top 3 highest-paid employees in each department.

Find departments where the total project budget exceeds 100000.

Find employees assigned to all projects in department 2.

Find employees whose salary is greater than the salary of their department manager (assume manager has emp_id in departments.manager_id).

Find the employee who has worked on the most number of projects.


Employees earning more than their department manager

SELECT e.*
FROM employees e
JOIN departments d ON e.dept_id = d.dept_id
WHERE e.salary > (
    SELECT salary
    FROM employees
    WHERE emp_id = d.manager_id
);


=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================
=====================================================================





Q1.

Retrieve all employees who earn more than 5000.

Q2.

Find employees hired after January 1, 2022.

Q3.

Count the number of employees in each department.

Q4.

List department names located in 'New York'.

Q5.

Find the highest salary in the company.

🟡 MEDIUM (6–12)
Q6.

Find the average salary per department.

Q7.

List employees along with their department name.

Q8.

Find employees who are not assigned to any project.

Q9.

Retrieve the second highest salary.

Q10.

Find departments having more than 3 employees.

Q11.

List employees earning more than the company average salary.

Q12.

Find the total project budget per department.

🔴 HARD (13–15)
Q13.

Find the employee(s) earning the highest salary in each department.

Q14.

List employees who earn more than their manager.

Q15.

Find the department with the highest total salary expense.
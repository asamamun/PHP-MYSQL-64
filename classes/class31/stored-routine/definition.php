<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MySQL Stored Procedures & Functions</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
    }
    .card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 20px;
      margin-bottom: 20px;
    }
    .card h2 {
      margin-top: 0;
      color: #2c3e50;
    }
    pre {
      background: #272822;
      color: #f8f8f2;
      padding: 10px;
      border-radius: 5px;
      overflow-x: auto;
    }
  </style>
</head>
<body>
    <h3>A stored routine is a set of SQL statements stored in the database server and executed 
    by calling an assigned name within a query</h3>

  <div class="card">
    <h2>Stored Procedure Syntax</h2>
    <pre>
DELIMITER //

CREATE PROCEDURE procedure_name ([IN | OUT | INOUT] param_name datatype, ...)
BEGIN
    -- SQL statements
END //

DELIMITER ;
    </pre>

    <h3>Example:</h3>
    <pre>
DELIMITER //

CREATE PROCEDURE GetEmployeeByID(IN emp_id INT)
BEGIN
    SELECT * FROM employees WHERE id = emp_id;
END //

DELIMITER ;
    </pre>
  </div>

  <div class="card">
    <h2>Stored Function Syntax</h2>
    <pre>
DELIMITER //

CREATE FUNCTION function_name (param_name datatype, ...)
RETURNS return_datatype
DETERMINISTIC
BEGIN
    -- SQL statements
    RETURN value;
END //

DELIMITER ;
    </pre>

    <h3>Example:</h3>
    <pre>
DELIMITER //

CREATE FUNCTION GetFullName(first_name VARCHAR(50), last_name VARCHAR(50))
RETURNS VARCHAR(100)
DETERMINISTIC
BEGIN
    RETURN CONCAT(first_name, ' ', last_name);
END //

DELIMITER ;
    </pre>
  </div>

  <div class="card">
    <h2>Usage</h2>
    <pre>
-- Call procedure
CALL GetEmployeeByID(101);

-- Use function
SELECT GetFullName('John', 'Doe');
    </pre>
  </div>
<h3>Declaring and Setting Variables in mysql</h3>
<h3>The BEGIN and END Block in mysql stored procedures</h3>
<h3>IF-ELSEIF-ELSE in mysql</h3>
<h3>Iteration in mysql</h3>
<h3>LEAVE in mysql</h3>
<h3>LOOP in mysql</h3>
</body>
</html>

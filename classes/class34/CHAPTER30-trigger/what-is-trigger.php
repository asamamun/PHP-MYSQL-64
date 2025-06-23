<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>A trigger is a task that executes in response to some predefined database event, such as after a new row is added to a particular table</h3>
    pros and cons of triggers
    <h4>Pros</h4>
    <ul>
        <li>Audit trails</li>
        <li>Validation</li>
        <li>Referential integrity enforcement</li>
        <li>Security</li>
        <li>Integrity</li>
    </ul>
    <h4>Cons</h4>
    <ul>
        <li>Complexity</li>
        <li>Performance</li>
    </ul>
    <h3>Triggers can be created using the CREATE TRIGGER statement. Syntax is:</h3>
    <pre>
        <code>
            CREATE TRIGGER trigger_name
            BEFORE/AFTER INSERT/UPDATE/DELETE ON table_name
            FOR EACH ROW
            BEGIN
                -- Trigger code goes here
            END
        </code>
    </pre>
    <h3>When to use before and when after trigger?</h3>
    <ul>
        <li>Before - for example, if you want to prevent a user from deleting a row that has a foreign key reference</li>
        <li>After - for example, if you want to update a table when a new row is added</li>
    </ul>
    <mark>Triggers must be unique: It's not possible to create multiple triggers sharing the same table, event (INSERT, UPDATE, DELETE),and cue (before, after). </mark>
<hr>
    trigger commands! <br>
    <code>mysql>SHOW TRIGGERS\G</code> <br>
    <code>mysql>SHOW CREATE TRIGGER au_reassign_ticket\G</code> <br>
    <code>DROP TRIGGER au_reassign_ticket;</code>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>What is authentication and authorization in MYSQL</h3>
    <p>Authentication is the process of verifying who someone is, while authorization is the process of verifying what levels of access someone has access to.</p>
    <pre>
From BOOK:
MySQL's privilege system is based on two general concepts:
• Authentication: Is the user even allowed to connect to the server?
• Authorization: Does the authenticated user possess adequate privileges to execute the desired query?
    </pre>
    <details>
        <summary>Where Is Access Information Stored?</summary>
        <p>Access information is stored in the <mark>mysql</mark> database user table.</p>
    </details>
    <details>
        <summary>HOSTs example</summary>
        <p>
            <pre>
                Several example entries follow: 
• www.example.com
• 192.168.1.2
• %
• %.example.com
• 192.168.1.0/255.255.255.0
• localhost
            </pre>
        </p>
    </details>
    <details>
        <summary>The db Table</summary>
        <p>The db table is used to assign privileges to a user on a per-database basis. It is examined if the requesting user does not possess global privileges for the task he's attempting to 
execute.</p>
    </details>
    <h1>User and Privilege Management</h1>
    <h3>Creating Users</h3>
    <p>
        <code>
            CREATE USER user [IDENTIFIED BY [PASSWORD] 'password']
 [, user [IDENTIFIED BY [PASSWORD] 'password']] ...
        </code>

    </p>
    <h3>Deleting Users</h3>
    <p>
        <code>
            DROP USER user [, user] ...
        </code>
    </p>
    <h3>Renaming Users</h3>
    <p>
        <code>
            RENAME USER user TO new_user
        </code>
    </p>
    <h1>The Grant and Revoke Commands</h1>
    <h3>Granting Privileges</h3>
    <p>
        <pre>
        <code>
GRANT privilege_type [(column_list)] [, privilege_type [(column_list)] ...]
 ON {table_name | * | *.* | database_name.*}
 TO user_name [IDENTIFIED BY 'password']
 [, user_name [IDENTIFIED BY 'password'] ...]
 [REQUIRE {SSL|X509} [ISSUER issuer] [SUBJECT subject]]
 [WITH GRANT OPTION]
        </code>
        </pre>
        example:
        <pre>
            <code>
mysql> grant select, insert on sakila.* to 'ellie'@'192.168.1.103' identified by 'secret';
mysql> grant update ON sakila.* TO 'ellie'@'192.168.1.103';
mysql> grant ALL PRIVILEGES on r64_php.* to 'round64';
            </code>
        </pre>
    </p>
    <h3>Revoking Privileges</h3>
    <p>
        <pre>
        <code>
REVOKE privilege_type [(column_list)] [, privilege_type [(column_list)]...]
 ON {table_name | * | *.* | database_name.*}
 FROM user_name [, user_name ...]
        </code>
        </pre>
        example:
        <pre>
            <code>
                mysql> revoke insert on sakila.* FROM 'will'@'192.168.1.102';
                mysql> revoke insert, update on sakila.film FROM 'will'@'192.168.1.102';
                Revoking Column-Level Permissions:
                mysql> revoke insert (title) ON sakila.film FROM 'will'@'192.168.1.102';
                you can revoke all privileges,
                mysql> revoke all privileges on sakila.* FROM 'will'@'192.168.1.102';
                mysql> revoke drop on r64_php.* from 'round64';

            </code>
        </pre>
    </p>
    <h1>SHOW GRANTS FOR user</h1>
    <pre>
        <code>
            mysql> show grants for 'ellie'@'192.168.1.102';
            mysql> show grants for CURRENT_USER();
        </code>
    </pre>


    <code>
        SELECT * FROM `products` WHERE `name` like '%phone%' or `description` like '%phone%'; <br>
        SELECT * FROM `products` WHERE `name` like '%phone%' and `description` like '%phone%'; <br>
        SELECT * FROM `categories` where name between "A" and "K"; <br>
        SELECT DISTINCT `category_id` FROM `products` WHERE 1; <br>
    </code>

    grant all privileges on jpp.* to 'genuity' identified by 'secret';
</body>
</html>